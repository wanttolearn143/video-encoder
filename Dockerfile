# Use Ubuntu base
FROM ubuntu:22.04

# Install FFmpeg and PHP CLI
RUN apt-get update && apt-get install -y ffmpeg php-cli

# Set working directory
WORKDIR /app

# Copy all repo files
COPY . .

# Run the worker
CMD ["php", "worker.php"]
