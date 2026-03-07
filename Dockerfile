FROM ubuntu:22.04

# Avoid interactive prompts
ENV DEBIAN_FRONTEND=noninteractive

# Install PHP CLI + cURL + FFmpeg
RUN apt-get update && \
    apt-get install -y php-cli php-curl ffmpeg tzdata && \
    rm -rf /var/lib/apt/lists/*

# Set working directory
WORKDIR /app

# Copy repo files
COPY . .

# Run the worker
CMD ["php", "worker.php"]
