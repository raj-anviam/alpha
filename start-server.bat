@echo off
REM Startup script for CodeIgniter application on port 8080 (Windows)
REM This uses PHP's built-in development server

set PORT=8080
set DOCUMENT_ROOT=%~dp0
set ROUTER=%DOCUMENT_ROOT%router.php

echo Starting CodeIgniter application server...
echo Document Root: %DOCUMENT_ROOT%
echo Port: %PORT%
echo.
echo Server will be available at: http://localhost:%PORT%
echo.
echo Press Ctrl+C to stop the server
echo.

REM Check if PHP is available
where php >nul 2>&1
if %ERRORLEVEL% NEQ 0 (
    echo Error: PHP is not installed or not in PATH
    exit /b 1
)

REM Start the PHP built-in server
php -S localhost:%PORT% -t "%DOCUMENT_ROOT%" "%ROUTER%"

