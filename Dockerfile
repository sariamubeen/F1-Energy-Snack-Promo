# Use a Debian base image
FROM debian:bullseye

# Install Node.js and PHP
RUN apt-get update && \
    apt-get install -y curl && \
    curl -fsSL https://deb.nodesource.com/setup_20.x | bash - && \
    apt-get install -y nodejs php php-fpm && \
    rm -rf /var/lib/apt/lists/*

# Set working directory
WORKDIR /app

# Copy both Node.js and PHP application files
COPY connect.js package.json package-lock.json index.php redeem_code.php ./

# Install Node.js dependencies
RUN npm install

# Expose port for PHP application
EXPOSE 80

# Start both Node.js and PHP servers
CMD sh -c "npm start & php -S 0.0.0.0:80"
