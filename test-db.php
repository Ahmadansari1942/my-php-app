<?php
/**
 * Database Connection Test File
 * Test MySQL/MariaDB connection
 */
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Database Test</title>
    <style>
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
        h1 { color: #333; margin-bottom: 20px; }
        .info-box {
            background: #f8f9fa;
            padding: 20px;
            border-radius: 10px;
            margin: 20px 0;
            border-left: 4px solid #667eea;
        }
        .success { border-left-color: #4caf50; background: #d4edda; color: #155724; }
        .error { border-left-color: #dc3545; background: #f8d7da; color: #721c24; }
        .back-link {
            display: inline-block;
            margin-top: 20px;
            color: #667eea;
            text-decoration: none;
            font-weight: 600;
        }
        code {
            background: #f4f4f4;
            padding: 2px 8px;
            border-radius: 4px;
            font-family: monospace;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>🗄️ Database Connection Test</h1>
        
        <?php
        // Database configuration
        $db_host = 'localhost';
        $db_user = 'root';
        $db_pass = '';
        $db_name = 'test_db';
        
        echo '<div class="info-box">';
        echo '<h3>Attempting to connect to MySQL/MariaDB...</h3>';
        echo '<p><strong>Host:</strong> ' . $db_host . '</p>';
        echo '<p><strong>User:</strong> ' . $db_user . '</p>';
        echo '<p><strong>Database:</strong> ' . $db_name . '</p>';
        echo '</div>';
        
        // Check if mysqli extension is loaded
        if (!extension_loaded('mysqli')) {
            echo '<div class="info-box error">';
            echo '<strong>❌ Error:</strong> MySQLi extension is not loaded!<br>';
            echo 'Install it using: <code>sudo apt install php-mysql</code>';
            echo '</div>';
        } else {
            echo '<div class="info-box success">';
            echo '✓ MySQLi extension is loaded';
            echo '</div>';
            
            // Try to connect
            $conn = @new mysqli($db_host, $db_user, $db_pass);
            
            if ($conn->connect_error) {
                echo '<div class="info-box error">';
                echo '<strong>❌ Connection Failed:</strong><br>';
                echo 'Error: ' . $conn->connect_error . '<br><br>';
                echo '<strong>Troubleshooting Steps:</strong><br>';
                echo '1. Install MySQL: <code>sudo apt install mysql-server</code><br>';
                echo '2. Start MySQL: <code>sudo systemctl start mysql</code><br>';
                echo '3. Check status: <code>sudo systemctl status mysql</code><br>';
                echo '4. Update credentials in this file if needed';
                echo '</div>';
            } else {
                echo '<div class="info-box success">';
                echo '<strong>✓ Successfully connected to MySQL!</strong><br>';
                echo 'Server Info: ' . $conn->server_info . '<br>';
                echo 'Host Info: ' . $conn->host_info;
                echo '</div>';
                
                // Try to select database
                if ($conn->select_db($db_name)) {
                    echo '<div class="info-box success">';
                    echo '✓ Database "' . $db_name . '" selected successfully!';
                    echo '</div>';
                } else {
                    echo '<div class="info-box error">';
                    echo '❌ Database "' . $db_name . '" not found<br>';
                    echo 'Create it using: <code>CREATE DATABASE ' . $db_name . ';</code>';
                    echo '</div>';
                }
                
                $conn->close();
            }
        }
        ?>
        
        <div class="info-box">
            <h3>📝 Setup Instructions</h3>
            <p><strong>To install and configure MySQL:</strong></p>
            <pre style="background: #2d2d2d; color: #f8f8f2; padding: 15px; border-radius: 5px; overflow-x: auto;">
# Install MySQL
sudo apt install mysql-server -y

# Start MySQL service
sudo systemctl start mysql
sudo systemctl enable mysql

# Secure installation (optional)
sudo mysql_secure_installation

# Create database and user
sudo mysql -e "CREATE DATABASE test_db;"
sudo mysql -e "CREATE USER 'appuser'@'localhost' IDENTIFIED BY 'password123';"
sudo mysql -e "GRANT ALL PRIVILEGES ON test_db.* TO 'appuser'@'localhost';"
sudo mysql -e "FLUSH PRIVILEGES;"
            </pre>
        </div>
        
        <a href="index.php" class="back-link">← Back to Home</a>
    </div>
</body>
</html>
