FROM lykkex/lykkecom:etalon
MAINTAINER Yuri Dvin <juri.dvinyaninov@lykke.com>

COPY . /app/public_html/
RUN composer config --global github-oauth.github.com ${OAUTHID}
RUN composer --working-dir=/app/public_html/ update
RUN chown -R www-data:www-data /app/public_html
RUN chown -R www-data:www-data /var/log/apache2

EXPOSE 80 443

ADD docker-entrypoint.sh /
RUN chmod +x /docker-entrypoint.sh
ENTRYPOINT ["/docker-entrypoint.sh"]
