<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = htmlspecialchars($_POST['name'] ?? '');
    $email = htmlspecialchars($_POST['email'] ?? '');
    
    // Simple validation
    if (empty($name) || empty($email)) {
        header('Location: index.php?error=empty');
        exit;
    }
    
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        header('Location: index.php?error=invalid_email');
        exit;
    }
    
    // Save to file (simple example)
    $data = "Name: $name, Email: $email, Time: " . date('Y-m-d H:i:s') . "\n";
    file_put_contents('submissions.txt', $data, FILE_APPEND);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thank You</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <div class="success-box">
            <h1>✓ Thank You!</h1>
            <p>Your submission has been received.</p>
            <p><strong>Name:</strong> <?php echo $name; ?></p>
            <p><strong>Email:</strong> <?php echo $email; ?></p>
            <a href="index.php" class="back-link">← Back to Home</a>
        </div>
    </div>
</body>
</html>
