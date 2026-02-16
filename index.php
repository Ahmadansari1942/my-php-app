<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My PHP Application</title>
    <link rel="stylesheet" href="style.css">
    <style>
        /* Inline CSS backup agar external file load na ho */
        * { margin: 0; padding: 0; box-sizing: border-box; }
        body { 
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            min-height: 100vh;
            padding: 20px;
        }
        .container {
            max-width: 800px;
            margin: 50px auto;
            background: white;
            border-radius: 15px;
            box-shadow: 0 10px 40px rgba(0, 0, 0, 0.2);
            padding: 40px;
        }
        h1 { color: #333; margin-bottom: 20px; text-align: center; font-size: 2.5em; }
        h2 { color: #667eea; margin: 30px 0 15px 0; font-size: 1.5em; }
        p { color: #666; line-height: 1.6; margin-bottom: 15px; }
        .info-box {
            background: #f8f9fa;
            padding: 20px;
            border-radius: 10px;
            margin: 20px 0;
            border-left: 4px solid #667eea;
        }
        .info-box ul { list-style: none; margin-top: 10px; }
        .info-box li { padding: 8px 0; color: #555; border-bottom: 1px solid #e0e0e0; }
        .info-box li:last-child { border-bottom: none; }
        .form-section { margin-top: 30px; }
        form { display: flex; flex-direction: column; gap: 15px; }
        label { font-weight: 600; color: #333; margin-bottom: 5px; }
        input[type="text"], input[type="email"] {
            padding: 12px;
            border: 2px solid #e0e0e0;
            border-radius: 8px;
            font-size: 16px;
            transition: border-color 0.3s;
        }
        input[type="text"]:focus, input[type="email"]:focus {
            outline: none;
            border-color: #667eea;
        }
        button {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            padding: 15px;
            border: none;
            border-radius: 8px;
            font-size: 16px;
            font-weight: 600;
            cursor: pointer;
            transition: transform 0.2s;
        }
        button:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(102, 126, 234, 0.4);
        }
        .status-badge {
            display: inline-block;
            padding: 5px 10px;
            border-radius: 5px;
            font-size: 14px;
            font-weight: 600;
        }
        .badge-success { background: #d4edda; color: #155724; }
        .badge-info { background: #d1ecf1; color: #0c5460; }
        .section-divider {
            border: none;
            border-top: 2px solid #e0e0e0;
            margin: 30px 0;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>🚀 Welcome to My PHP Application</h1>
        
        <div class="info-box">
            <p style="text-align: center; font-size: 18px; margin: 0;">
                <strong>Current Date & Time:</strong> 
                <span class="status-badge badge-info"><?php echo date('l, F j, Y - H:i:s'); ?></span>
            </p>
        </div>

        <hr class="section-divider">

        <div class="info-box">
            <h2>📊 Server Information</h2>
            <ul>
                <li>
                    <strong>PHP Version:</strong> 
                    <span class="status-badge badge-success"><?php echo phpversion(); ?></span>
                </li>
                <li>
                    <strong>Server Software:</strong> 
                    <?php echo isset($_SERVER['SERVER_SOFTWARE']) ? $_SERVER['SERVER_SOFTWARE'] : 'Not Available'; ?>
                </li>
                <li>
                    <strong>Server Name:</strong> 
                    <?php echo isset($_SERVER['SERVER_NAME']) ? $_SERVER['SERVER_NAME'] : 'localhost'; ?>
                </li>
                <li>
                    <strong>Server IP:</strong> 
                    <?php echo isset($_SERVER['SERVER_ADDR']) ? $_SERVER['SERVER_ADDR'] : 'Not Available'; ?>
                </li>
                <li>
                    <strong>Server Port:</strong> 
                    <?php echo isset($_SERVER['SERVER_PORT']) ? $_SERVER['SERVER_PORT'] : '80'; ?>
                </li>
                <li>
                    <strong>Document Root:</strong> 
                    <?php echo isset($_SERVER['DOCUMENT_ROOT']) ? $_SERVER['DOCUMENT_ROOT'] : 'Not Available'; ?>
                </li>
                <li>
                    <strong>Request Method:</strong> 
                    <?php echo isset($_SERVER['REQUEST_METHOD']) ? $_SERVER['REQUEST_METHOD'] : 'GET'; ?>
                </li>
                <li>
                    <strong>User Agent:</strong> 
                    <?php echo isset($_SERVER['HTTP_USER_AGENT']) ? substr($_SERVER['HTTP_USER_AGENT'], 0, 80) . '...' : 'Not Available'; ?>
                </li>
            </ul>
        </div>

        <hr class="section-divider">

        <div class="info-box">
            <h2>⚙️ PHP Configuration</h2>
            <ul>
                <li><strong>Max Execution Time:</strong> <?php echo ini_get('max_execution_time'); ?> seconds</li>
                <li><strong>Memory Limit:</strong> <?php echo ini_get('memory_limit'); ?></li>
                <li><strong>Upload Max Filesize:</strong> <?php echo ini_get('upload_max_filesize'); ?></li>
                <li><strong>Post Max Size:</strong> <?php echo ini_get('post_max_size'); ?></li>
                <li><strong>Display Errors:</strong> <?php echo ini_get('display_errors') ? 'On' : 'Off'; ?></li>
            </ul>
        </div>

        <hr class="section-divider">

        <div class="info-box">
            <h2>🔌 Loaded PHP Extensions</h2>
            <p style="line-height: 2;">
                <?php 
                $extensions = get_loaded_extensions();
                sort($extensions);
                foreach($extensions as $ext) {
                    echo '<span class="status-badge badge-success" style="margin: 3px;">' . $ext . '</span> ';
                }
                ?>
            </p>
        </div>

        <hr class="section-divider">

        <div class="form-section">
            <h2>📝 Test Form</h2>
            <p>Fill out the form below to test form submission functionality.</p>
            
            <?php if(isset($_GET['success'])): ?>
                <div style="background: #d4edda; color: #155724; padding: 15px; border-radius: 8px; margin-bottom: 20px; border-left: 4px solid #28a745;">
                    ✓ Form submitted successfully! Check submissions.txt file.
                </div>
            <?php endif; ?>

            <?php if(isset($_GET['error'])): ?>
                <div style="background: #f8d7da; color: #721c24; padding: 15px; border-radius: 8px; margin-bottom: 20px; border-left: 4px solid #dc3545;">
                    ✗ Error: <?php echo htmlspecialchars($_GET['error']); ?>
                </div>
            <?php endif; ?>

            <form method="POST" action="process.php">
                <label for="name">Your Name:</label>
                <input type="text" id="name" name="name" required placeholder="Enter your full name">
                
                <label for="email">Your Email:</label>
                <input type="email" id="email" name="email" required placeholder="Enter your email address">
                
                <label for="message">Message (Optional):</label>
                <textarea id="message" name="message" rows="4" style="padding: 12px; border: 2px solid #e0e0e0; border-radius: 8px; font-size: 16px; font-family: inherit; resize: vertical;" placeholder="Enter your message"></textarea>
                
                <button type="submit">Submit Form</button>
            </form>
        </div>

        <hr class="section-divider">

        <div style="text-align: center; color: #666; margin-top: 30px;">
            <p><strong>Quick Links:</strong></p>
            <p>
                <a href="phpinfo.php" style="color: #667eea; text-decoration: none; margin: 0 10px;">📄 PHP Info</a> |
                <a href="test-db.php" style="color: #667eea; text-decoration: none; margin: 0 10px;">🗄️ Database Test</a> |
                <a href="." style="color: #667eea; text-decoration: none; margin: 0 10px;">🏠 Home</a>
            </p>
        </div>
    </div>

    <script>
        // Form validation
        document.querySelector('form').addEventListener('submit', function(e) {
            const name = document.getElementById('name').value.trim();
            const email = document.getElementById('email').value.trim();
            
            if(name.length < 2) {
                alert('Name must be at least 2 characters long');
                e.preventDefault();
                return false;
            }
            
            if(!email.includes('@')) {
                alert('Please enter a valid email address');
                e.preventDefault();
                return false;
            }
        });
    </script>
</body>
</html>
