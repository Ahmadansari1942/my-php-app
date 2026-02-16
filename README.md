# My PHP Application

A simple PHP application demonstrating form handling and server information display.

## Features
- Display current date/time
- Show PHP and server information
- Form submission with validation
- Clean and responsive UI

## Requirements
- PHP 7.4 or higher
- Web server (Apache/Nginx)
- Git

## Local Development

1. Clone the repository:
```bash
git clone https://github.com/YOUR_USERNAME/my-php-app.git
cd my-php-app
```

2. Start PHP built-in server:
```bash
php -S localhost:8000
```

3. Open browser: `http://localhost:8000`

## Deployment

See [DEPLOYMENT_GUIDE.md](DEPLOYMENT_GUIDE.md) for complete EC2 deployment instructions.

## File Structure
```
my-php-app/
├── index.php           # Main page
├── process.php         # Form handler
├── style.css           # Styles
├── phpinfo.php         # PHP info (remove in production)
├── README.md           # This file
└── DEPLOYMENT_GUIDE.md # Deployment instructions
```

## License
MIT
