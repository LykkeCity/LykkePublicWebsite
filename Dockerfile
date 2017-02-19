FROM debian
MAINTAINER Yuri Dvin <juri.dvinyaninov@lykke.com>

# Install Software
RUN apt-get -qq update \
      && apt-get install -y telnet iputils-ping vim curl zip mysql-client \
      && apt-get install -y apache2 \
      && apt-get install -y php5 libapache2-mod-php5 php5-mysql php-xml-parser php5-curl php5-gd php5-mcrypt mcrypt \
      && rm -f /etc/apache2/sites-enabled/*

# App settings
RUN curl -sS https://getcomposer.org/installer | php
RUN mv composer.phar /usr/local/bin/composer
RUN composer global require "fxp/composer-asset-plugin:^1.2.0"
COPY . /app/public_html/
ADD docker/apache/.htaccess /app/public_html/.htaccess
COPY docker/dump/ /dump/
COPY docker/scripts/ /scripts/
RUN chown -R www-data:www-data /app/public_html/frontend/web/assets
RUN chown -R www-data:www-data /app/public_html/frontend/web/userfiles
RUN chown -R www-data:www-data /app/public_html/frontend/web/media
RUN chown -R www-data:www-data /app/public_html/backend/web/assets
RUN chown -R www-data:www-data /app/public_html/backend/runtime
RUN composer config --global github-oauth.github.com 7f320f72bdaf74dcd5f37b425883700c76c0c467
RUN composer --working-dir=/app/public_html/ update

# Apache settings
ADD docker/apache/default-site.conf /etc/apache2/sites-available/default-site.conf
ADD docker/apache/certs/server.crt-example /etc/apache2/certs/server.crt-example
ADD docker/apache/certs/server.key-example /etc/apache2/certs/server.key-example
RUN ln -s /etc/apache2/sites-available/default-site.conf /etc/apache2/sites-enabled/default-site.conf
RUN a2enmod rewrite
RUN a2dismod mpm_event
RUN a2enmod mpm_prefork
RUN a2enmod ssl

# Apache2 php module settings
RUN sed -i "s/display_errors = .*/display_errors = On/" /etc/php5/apache2/php.ini
RUN sed -i "s/short_open_tag = .*/short_open_tag = On/" /etc/php5/apache2/php.ini
RUN sed -i "s/;realpath_cache_size = .*/realpath_cache_size = 4096k/" /etc/php5/apache2/php.ini
RUN sed -i "s/;opcache.revalidate_freq=.*/opcache.revalidate_freq=0/" /etc/php5/apache2/php.ini
RUN sed -i "s/;mbstring.internal_encoding =.*/mbstring.internal_encoding = UTF-8/" /etc/php5/apache2/php.ini
RUN sed -i "s/;mbstring.func_overload =.*/mbstring.func_overload = 2/" /etc/php5/apache2/php.ini
RUN sed -i "s/; max_input_vars =.*/max_input_vars = 10000/" /etc/php5/apache2/php.ini
# Php CLI settings
RUN sed -i "s/short_open_tag = .*/short_open_tag = On/" /etc/php5/cli/php.ini
RUN sed -i "s/;realpath_cache_size = .*/realpath_cache_size = 4096k/" /etc/php5/cli/php.ini
RUN sed -i "s/;opcache.revalidate_freq=.*/opcache.revalidate_freq=0/" /etc/php5/cli/php.ini
RUN sed -i "s/;mbstring.internal_encoding =.*/mbstring.internal_encoding = UTF-8/" /etc/php5/cli/php.ini
RUN sed -i "s/;mbstring.func_overload =.*/mbstring.func_overload = 2/" /etc/php5/cli/php.ini
RUN sed -i "s/; max_input_vars =.*/max_input_vars = 10000/" /etc/php5/cli/php.ini

# Ports
EXPOSE 80 443

ADD docker-entrypoint.sh /
RUN chmod +x /docker-entrypoint.sh
ENTRYPOINT ["/docker-entrypoint.sh"]
