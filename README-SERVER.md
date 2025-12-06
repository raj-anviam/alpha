# Running the Application on Port 8080

This CodeIgniter application can now be run on port 8080 using PHP's built-in development server.

## Quick Start

### Linux/Mac:
```bash
./start-server.sh
```

### Windows:
```cmd
start-server.bat
```

### Manual Start:
```bash
php -S localhost:8080 -t . router.php
```

## Access the Application

Once the server is running, access your application at:
- **http://localhost:8080**

## Features

- ✅ Runs on port 8080
- ✅ Automatic URL rewriting (similar to Apache mod_rewrite)
- ✅ Serves static files directly (CSS, JS, images, etc.)
- ✅ Minimal configuration changes required
- ✅ Works with CodeIgniter's routing system

## Stopping the Server

Press `Ctrl+C` in the terminal where the server is running.

## Notes

- This uses PHP's built-in development server, which is suitable for development only
- For production, use Apache or Nginx with proper configuration
- The configuration automatically detects localhost:8080 and sets the base URL accordingly

