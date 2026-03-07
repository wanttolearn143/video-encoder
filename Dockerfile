FROM ubuntu:22.04

# Avoid interactive prompts during apt install
ENV DEBIAN_FRONTEND=noninteractive

RUN apt-get update && \
    apt-get install -y ffmpeg php-cli tzdata && \
    rm -rf /var/lib/apt/lists/*

WORKDIR /app

COPY . .

CMD ["php", "worker.php"]
