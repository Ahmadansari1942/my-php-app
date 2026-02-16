<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = htmlspecialchars($_POST['name'] ?? '');
    $email = htmlspecialchars($_POST['email'] ?? '');
    $message = htmlspecialchars($_POST['message'] ?? '');
    
    // Simple validation
    if (empty($name) || empty($email)) {
        header('Location: index.php?error=empty_fields');
        exit;
    }
    
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        header('Location: index.php?error=invalid_email');
        exit;
    }
    
    // Save to file (simple example)
    $data = json_encode([
        'name' => $name,
        'email' => $email,
        'message' => $message,
        'timestamp' => date('Y-m-d H:i:s'),
        'ip' => $_SERVER['REMOTE_ADDR'] ?? 'Unknown'
    ]) . "\n";
    
    $result = file_put_contents('submissions.txt', $data, FILE_APPEND);
    
    if ($result === false) {
        header('Location: index.php?error=file_write_failed');
        exit;
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thank You - My PHP Application</title>
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            min-height: 100vh;
            padding: 20px;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .container {
            max-width: 600px;
            background: white;
            border-radius: 15px;
            box-shadow: 0 10px 40px rgba(0, 0, 0, 0.2);
            padding: 60px 40px;
            text-align: center;
        }
        .success-icon {
            font-size: 80px;
            color: #4caf50;
            margin-bottom: 20px;
            animation: scaleIn 0.5s ease-out;
        }
        h1 {
            color: #333;
            font-size: 2.5em;
            margin-bottom: 20px;
        }
        .message {
            color: #666;
            font-size: 18px;
            line-height: 1.6;
            margin-bottom: 30px;
        }
        .details {
            background: #f8f9fa;
            padding: 20px;
            border-radius: 10px;
            text-align: left;
            margin: 30px 0;
            border-left: 4px solid #4caf50;
        }
        .details p {
            margin: 10px 0;
            color: #555;
        }
        .details strong {
            color: #333;
        }
        .back-link {
            display: inline-block;
            margin-top: 30px;
            color: white;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            text-decoration: none;
            font-weight: 600;
            padding: 15px 40px;
            border-radius: 8px;
            transition: all 0.3s;
            box-shadow: 0 4px 15px rgba(102, 126, 234, 0.3);
        }
        .back-link:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(102, 126, 234, 0.4);
        }
        @keyframes scaleIn {
            0% { transform: scale(0); }
            50% { transform: scale(1.1); }
            100% { transform: scale(1); }
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="success-icon">✓</div>
        <h1>Thank You!</h1>
        <p class="message">Your submission has been received successfully.</p>
        
        <div class="details">
            <p><strong>Name:</strong> <?php echo $name; ?></p>
            <p><strong>Email:</strong> <?php echo $email; ?></p>
            <?php if(!empty($message)): ?>
                <p><strong>Message:</strong> <?php echo nl2br($message); ?></p>
            <?php endif; ?>
            <p><strong>Submitted at:</strong> <?php echo date('l, F j, Y - H:i:s'); ?></p>
        </div>

        <p class="message">We'll get back to you as soon as possible.</p>
        
        <a href="index.php" class="back-link">← Back to Home</a>
    </div>
</body>
</html>
