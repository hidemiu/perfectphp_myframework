# Download repository, epel,remi.
sudo yum -y install epel-release
sudo yum -y install http://rpms.famillecollet.com/enterprise/remi-release-7.rpm
sudo yum -y install http://dev.mysql.com/get/mysql-community-release-el6-5.noarch.rpm

# Install git, unzip, apache, php7.1 and its packages
sudo yum -y install git unzip httpd
sudo yum -y install --enablerepo=remi,remi-php71 php php-devel php-mbstring php-intl php-mysql php-xml
sudo yum -y install mysql-community-server

# Download and set up composer
# curl -sS https://getcomposer.org/installer | php
# mv composer.phar /usr/local/bin/composer

# Start apache
sudo systemctl enable httpd.service
sudo systemctl start httpd.service
# sudo service httpd start
# sudo chkconfig httpd on

# Setup shared directory to apache
sudo rm -rf /var/www/html
sudo ln -fs /vagrant /var/www/html

# Start mysql
sudo systemctl enable mysqld.service
sudo systemctl start mysqld.service

# Install and setup Postgresql9.6
# sudo yum install -y https://yum.postgresql.org/9.6/redhat/rhel-7-x86_64/pgdg-redhat96-9.6-3.noarch.rpm
# sudo yum install -y postgresql96-server postgresql96-contrib
# sudo /usr/pgsql-9.6/bin/postgresql96-setup initdb
# sudo systemctl start postgresql-9.6.service
# sudo systemctl enable postgresql-9.6.service
