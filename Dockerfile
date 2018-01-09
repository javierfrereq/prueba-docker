# CentOS 7 Dockerfile
# Pull base image
FROM centos:latest

# Maintener
MAINTAINER Freddy Javier Frere Quintero <javierfrereq@gmail.com>

# Update CentOS 7
RUN yum update -y && yum upgrade -y

# Install package
RUN yum -y install httpd; yum clean all; systemctl enable httpd.service
RUN yum -y install php
RUN yum -y install php-mysql

EXPOSE 80
CMD ["/usr/sbin/init"]

# Clean CentOS 7
RUN yum clean all

# Set the environment variables
ENV HOME /root

# Working directory
WORKDIR /root

# Default command
CMD ["bash"]
CMD systemctl start httpd.service
CMD systemctl restart httpd.service
