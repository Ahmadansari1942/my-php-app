<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My PHP Application</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h1>Welcome to My PHP Application</h1>
        <p>Current Date & Time: <?php echo date('Y-m-d H:i:s'); ?></p>
        
        <div class="info-box">
            <h2>Server Information</h2>
            <ul>
                <li><strong>PHP Version:</strong> <?php echo phpversion(); ?></li>
                <li><strong>Server Software:</strong> <?php echo $_SERVER['SERVER_SOFTWARE']; ?></li>
                <li><strong>Server Name:</strong> <?php echo $_SERVER['SERVER_NAME']; ?></li>
            </ul>
        </div>

        <div class="form-section">
            <h2>Test Form</h2>
            <form method="POST" action="process.php">
                <label for="name">Your Name:</label>
                <input type="text" id="name" name="name" required>
                
                <label for="email">Your Email:</label>
                <input type="email" id="email" name="email" required>
                
                <button type="submit">Submit</button>
            </form>
        </div>
    </div>
</body>
</html>
