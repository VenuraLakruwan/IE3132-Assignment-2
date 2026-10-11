FROM ubuntu:26.04

ENV DEBIAN_FRONTEND=noninteractive

# Install Web Stack, SSH, and Process Manager
RUN apt-get update && apt-get install -y \
    apache2 \
    php \
    libapache2-mod-php \
    openssh-server \
    supervisor \
    && rm -rf /var/lib/apt/lists/*

# Configure SSH environment
RUN mkdir -p /var/run/sshd
RUN echo 'PermitRootLogin no' >> /etc/ssh/sshd_config

# Create the CTF user and set the password to match the cracked MD5 hash
RUN useradd -m -s /bin/bash phantom \
    && echo "phantom:babyko" | chpasswd

# Setup the Stage 5 and Stage 6 Flags
# Stage 6 Flag (Root)
RUN echo "CTF{R00T_Pr1v1l3g3_Escalati0n_Succ3ss}" > /root/root.txt
RUN chmod 600 /root/root.txt

# Stage 5 Flag (User) - Generate a haystack of 400 decoy files and hide the flag
RUN bash -c 'mkdir -p /home/phantom/server_logs && \
    for i in {1..20}; do \
        mkdir -p /home/phantom/server_logs/archive_$i; \
        for j in {1..20}; do \
            echo "System Log: Routine automated task completed successfully." > /home/phantom/server_logs/archive_$i/log_$j.txt; \
        done; \
    done && \
    echo "CTF{User_F00th0ld_Establ1sh3d}" > /home/phantom/server_logs/archive_14/log_7.txt && \
    chown -R phantom:phantom /home/phantom/server_logs'

# Stage 6 Vulnerability: Set SUID bit on /usr/bin/find
RUN chmod 4755 /usr/bin/find

# Copy CTF web assets to the Apache root
COPY /src/index.php /var/www/html/
COPY /src/pages/ /var/www/html/pages/
COPY /src/includes/ /var/www/html/includes/
COPY /src/assets/ /var/www/html/assets/

# Remove default Apache page and set permissions
RUN rm /var/www/html/index.html
RUN chown -R www-data:www-data /var/www/html/

# Copy Supervisor configuration
COPY config/supervisord.conf /etc/supervisor/conf.d/supervisord.conf

# Expose required internal ports
EXPOSE 80 22

# Start Supervisor to launch Apache and SSH simultaneously
CMD ["/usr/bin/supervisord", "-c", "/etc/supervisor/conf.d/supervisord.conf"]
