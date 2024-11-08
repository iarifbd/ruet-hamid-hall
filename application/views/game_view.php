<!DOCTYPE html> 
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Spin the Wheel Game</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            text-align: center;
            background-color: #f7f7f7;
            padding: 20px;
        }
        h1 {
            color: #333;
        }
        #wheel-container {
            position: relative;
            width: 300px;
            height: 300px;
            margin: 50px auto;
        }
        #wheel {
            width: 100%;
            height: 100%;
            border-radius: 50%;
            border: 10px solid #000;
            position: relative;
            background: #f4f4f4;
            display: flex;
            justify-content: center;
            align-items: center;
            cursor: pointer;
            transition: transform 3s ease-out;
        }
        #pointer {
            position: absolute;
            top: 0;
            left: 50%;
            transform: translateX(-50%);
            width: 0;
            height: 0;
            border-left: 10px solid transparent;
            border-right: 10px solid transparent;
            border-bottom: 20px solid #f44336;
            z-index: 10;
        }
        #spin-btn {
            background-color: #4CAF50;
            color: white;
            padding: 15px 20px;
            border: none;
            font-size: 18px;
            cursor: pointer;
            margin-top: 30px;
            transition: background-color 0.3s ease;
        }
        #spin-btn:hover {
            background-color: #45a049;
        }
        #spin-btn:disabled {
            background-color: #ccc;
        }
        .gift {
            margin-top: 20px;
            font-size: 24px;
            font-weight: bold;
        }
        #win-indicator {
            font-size: 22px;
            font-weight: bold;
            color: #4CAF50;
            margin-top: 20px;
            visibility: hidden;  /* Initially hidden */
        }
    </style>
</head>
<body>

<h1>Spin the Wheel and Win a Gift!</h1>

<div id="wheel-container">
    <div id="wheel" onclick="spinWheel()">
        <img src="https://png.pngtree.com/png-vector/20230220/ourmid/pngtree-spin-wheel-vector-illustration-png-image_6606505.png" alt="Spin Wheel" width="300" height="300" />
    </div>
    <!-- Pointer at the top of the wheel -->
    <div id="pointer"></div>
</div>

<button id="spin-btn" onclick="spinWheel()">Spin the Wheel</button>

<div class="gift" id="gift"></div>
<div id="win-indicator">Congratulations!</div> <!-- Hidden win indicator -->

<script>
    function spinWheel() {
        // Disable the button to prevent multiple spins
        document.getElementById("spin-btn").disabled = true;
        document.getElementById("win-indicator").style.visibility = 'hidden'; // Hide win indicator initially

        // Trigger spinning animation
        let wheel = document.getElementById("wheel");
        let randomRotation = Math.random() * 360 + 1800; // Random spin angle + full rotations
        wheel.style.transform = "rotate(" + randomRotation + "deg)";

        // Wait for the animation to complete, then fetch the result
        setTimeout(function() {
            // After the spin, make an AJAX call to get a random gift
            fetch('<?= base_url('game/spin'); ?>')
                .then(response => response.json())  // Parse the JSON response
                .then(data => {
                    // Check if data is valid
                    if (data && data.gift_name) {
                        // Display the gift information
                        document.getElementById("gift").innerHTML = `You won: <strong>${data.gift_name}</strong><br>${data.gift_description}`;
                        document.getElementById("win-indicator").style.visibility = 'visible'; // Show win indicator
                    } else {
                        // Handle case if no data is returned
                        document.getElementById("gift").innerHTML = "Sorry, no gift found.";
                    }

                    // Re-enable the button after showing result
                    document.getElementById("spin-btn").disabled = false;
                })
                .catch(err => {
                    // Handle errors if the fetch fails
                    console.error('Error:', err);
                    document.getElementById("gift").innerHTML = "Sorry, something went wrong.";
                    document.getElementById("spin-btn").disabled = false;
                });
        }, 3000); // Duration of the spin animation (in ms)
    }
</script>

</body>
</html>
