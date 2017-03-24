FROM lykkex/lykkecom:etalon
MAINTAINER Yuri Dvin <juri.dvinyaninov@lykke.com>

COPY . /app/public_html/
COPY docker/dump/ /dump/
COPY docker/scripts/ /scripts/
ADD docker/apache/default-site.conf /etc/apache2/sites-available/default-site.conf
ADD docker/apache/certs/server.crt-example /etc/apache2/certs/server.crt-example
ADD docker/apache/certs/server.key-example /etc/apache2/certs/server.key-example
RUN composer config --global github-oauth.github.com ${OAUTHID}
RUN composer --working-dir=/app/public_html/ update
RUN chown -R www-data:www-data /app/public_html
RUN chown -R www-data:www-data /var/log/apache2

EXPOSE 80 443

ADD docker-entrypoint.sh /
RUN chmod +x /docker-entrypoint.sh
ENTRYPOINT ["/docker-entrypoint.sh"]
