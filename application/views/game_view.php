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
        }

        h1 {
            color: #333;
        }

        /* Wheel container */
        #wheel-container {
            position: relative;
            width: 300px;
            height: 300px;
            margin: 50px auto;
        }

        /* Actual wheel (circle) */
        #wheel {
            width: 100%;
            height: 100%;
            border-radius: 50%;
            position: relative;
            background: #f4f4f4;
            display: flex;
            justify-content: center;
            align-items: center;
            cursor: pointer;
            transition: transform 3s ease-out; /* Smooth spin */
            border: 5px solid #000; /* Optional, for a border around the wheel */
        }

        /* Segments of the wheel */
        .wheel-segment {
            position: absolute;
            width: 50%;
            height: 50%;
            background-color: #FF5733;
            transform-origin: 100% 100%;
            text-align: center;
            display: flex;
            justify-content: center;
            align-items: center;
            font-size: 14px;
            font-weight: bold;
            color: white;
            border-radius: 50%;
            padding: 5px;
        }

        /* Center Circle in the wheel */
        #center-circle {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            background-color: red;
            position: absolute;
            z-index: 10;
        }

        /* Pointer at the top of the wheel */
        #pointer {
            position: absolute;
            top: -20px;
            left: 50%;
            transform: translateX(-50%);
            width: 0;
            height: 0;
            border-left: 10px solid transparent;
            border-right: 10px solid transparent;
            border-bottom: 20px solid #f44336;
            z-index: 15;
        }

        /* Spin Button */
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

        /* Result text */
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
        <!-- Center Circle -->
        <div id="center-circle"></div>
        <!-- Wheel Segments -->
    </div>
    <!-- Pointer -->
    <div id="pointer"></div>
</div>

<button id="spin-btn" onclick="spinWheel()">Spin the Wheel</button>

<div class="gift" id="gift"></div>
<div id="win-indicator">Congratulations!</div> <!-- Hidden win indicator -->

<script>
// Gift names and their corresponding colors
const gifts = [
    { name: "Gift A", color: "#FF5733" },
    { name: "Gift B", color: "#FF8D1A" },
    { name: "Gift C", color: "#FFEB33" },
    { name: "Gift D", color: "#4CAF50" },
    { name: "Gift E", color: "#33FF57" },
    { name: "Gift F", color: "#33D6FF" },
    { name: "Gift G", color: "#3380FF" },
    { name: "Gift H", color: "#9C33FF" }
];

// Create the wheel with segments and labels
function createWheel() {
    const wheel = document.getElementById("wheel");
    const numSegments = gifts.length;
    const angleStep = 360 / numSegments;

    gifts.forEach((gift, index) => {
        const segment = document.createElement("div");
        segment.classList.add("wheel-segment");
        segment.style.backgroundColor = gift.color;
        segment.style.transform = `rotate(${index * angleStep}deg)`;
        segment.style.clipPath = "polygon(100% 0%, 100% 100%, 0 100%, 0 0%)"; // Creates the wedge shape
        segment.innerHTML = gift.name;
        wheel.appendChild(segment);
    });
}

// Rotate the wheel and show result
function spinWheel() {
    // Disable the button to prevent multiple spins
    document.getElementById("spin-btn").disabled = true;
    document.getElementById("win-indicator").style.visibility = 'hidden'; // Hide win indicator initially

    // Trigger spinning animation
    const wheel = document.getElementById("wheel");
    const randomRotation = Math.random() * 360 + 1800; // Random spin angle + full rotations
    wheel.style.transform = `rotate(${randomRotation}deg)`;

    // Wait for the animation to complete, then fetch the result
    setTimeout(function() {
        const winningSegmentIndex = Math.floor((randomRotation % 360) / (360 / gifts.length));
        const winningGift = gifts[winningSegmentIndex];
        
        // Display the gift information
        document.getElementById("gift").innerHTML = `You won: <strong>${winningGift.name}</strong>`;
        document.getElementById("win-indicator").style.visibility = 'visible'; // Show win indicator

        // Re-enable the button after showing result
        document.getElementById("spin-btn").disabled = false;
    }, 3000); // Duration of the spin animation (in ms)
}

// Initialize the wheel on page load
createWheel();
</script>

</body>
</html>
