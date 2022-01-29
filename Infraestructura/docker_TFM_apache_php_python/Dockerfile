#FROM ubuntu/apache2
FROM ubuntu/apache2:2.4-20.04_beta

RUN apt update -q 

RUN apt upgrade -y

RUN apt install build-essential -y

RUN apt install php libapache2-mod-php php-mysql -y

RUN apt install git -y

RUN apt install nano -y

RUN apt install python3 python3-pip -y

RUN pip3 install matplotlib

RUN pip3 install pandas

RUN pip3 install numpy

RUN pip3 install scikit-learn

RUN pip3 install scikit-fuzzy

RUN pip3 install pymysql


