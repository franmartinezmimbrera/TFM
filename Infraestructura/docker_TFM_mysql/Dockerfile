###############CREACIÓN FICHERO DOCKERFILE SGDB MARIADB###############
# MariaDB 10.3 
#####################################################################
# Descarga la última imagen de mariadb
FROM mariadb:latest
# Actualizamos los paquetes de la imagen 
RUN apt-get update && apt-get install

RUN apt install nano -y

RUN apt install git -y
# Configuramos el password del root
RUN echo "root:PONERPASWWORD" | chpasswd

