#!/bin/bash

# Startup script for CodeIgniter application on port 8080
# This uses PHP's built-in development server

PORT=8000
DOCUMENT_ROOT="$(cd "$(dirname "$0")" && pwd)"
ROUTER="$DOCUMENT_ROOT/router.php"

echo "Starting CodeIgniter application server..."
echo "Document Root: $DOCUMENT_ROOT"
echo "Port: $PORT"
echo ""
echo "Server will be available at: http://localhost:$PORT"
echo ""
echo "Press Ctrl+C to stop the server"
echo ""

# Check if PHP is available
if ! command -v php &> /dev/null; then
    echo "Error: PHP is not installed or not in PATH"
    exit 1
fi

# Check if port is already in use
if lsof -Pi :$PORT -sTCP:LISTEN -t >/dev/null 2>&1 ; then
    echo "Warning: Port $PORT is already in use. Trying to continue anyway..."
    echo ""
fi

# Start the PHP built-in server
php -S localhost:$PORT -t "$DOCUMENT_ROOT" "$ROUTER"

