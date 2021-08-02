FROM vanio/php-postgres:7.4

#copia configuração do apache
COPY ./public/assets/docker/000-default.conf /etc/apache2/sites-available/000-default.conf

#reinicia o servidor apache para aplicar configuração copiada anteriormente
RUN service apache2 restart

#atualiza lista de pacotes e instala o nano
RUN apt update && apt install -y nano
