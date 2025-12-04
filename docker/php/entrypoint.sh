#!/bin/bash
set -e

# Wait for database connection
echo "Waiting for database..."
until nc -z -v -w30 "$DB_HOST" 3306
do
  echo "Waiting for database connection..."
  sleep 5
done
echo "Database is up!"

# Run migrations
if [ "$RUN_MIGRATIONS" = "true" ]; then
    echo "Running migrations..."
    bin/cake migrations migrate
fi

# Set permissions (if needed, though usually handled by user mapping or build)
# In dev, we might need to ensure tmp/logs are writable if mounted from host
if [ -d "tmp" ]; then
    chmod -R 777 tmp
fi
if [ -d "logs" ]; then
    chmod -R 777 logs
fi

# Execute the main command (apache)
exec "$@"
