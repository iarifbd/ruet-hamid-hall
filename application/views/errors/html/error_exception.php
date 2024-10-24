<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Error</title>
    <style>
        body {
             display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
            background-color: #f8f9fa;
            font-family: 'Arial', sans-serif;
        }
        .error-container {
            text-align: center;
        }
        .error-code {
            font-size: 100px;
            font-weight: bold;
            color: #dc3545;
            animation: bounce 1s infinite;}
    </style>
</head>
<body>
    <div class="error-container">
        <h1>An Error Occurred</h1>
        <p>Sorry, something went wrong.</p>
        <p><strong>Error Message:</strong> <?php echo htmlspecialchars($message); ?></p>
        <p><strong>Error Code:</strong> <?php echo htmlspecialchars($code); ?></p>
    </div>
</body>
</html>
