import pymysql

def conecta_mysql(host=None, user=None, passwd=None, bbdd=None):
   con = pymysql.connect(host=host,user=user,passwd=passwd,db=bbdd)
   return con

def dameDatosConexion():

  
   dirFichero = 'datos_conexion.txt'

   f = open (dirFichero,'r')

   hostMySQL=f.readline()
   userMySQL=f.readline()
   passwordMySQL=f.readline()
   portMySQL=f.readline()

   f.close()

   return hostMySQL,portMySQL,userMySQL,passwordMySQL

