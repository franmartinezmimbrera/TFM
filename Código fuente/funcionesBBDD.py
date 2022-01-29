import conecta_bbdd

#**************************************************
#FUNCIÓN PARA CREAR UNA CONEXION A LA BASE DE DATOS Y PODER COMPARTIRLA.
#ESTO LO HAGO PORQUE CUANDO HAY MILES DE APERTURAS Y CIERRES DE LA BBDD SEGUIDAS EMPIEZA RECHAZAR CONEXION, POR TANTO LA COMPARTO Y VA BIEN
#**************************************************
def creaconexion():

      hostMySQL,portMySQL,userMySQL,passwordMySQL= conecta_bbdd.dameDatosConexion()

      x = conecta_bbdd.conecta_mysql(hostMySQL[:-1],userMySQL[:-1],passwordMySQL[:-1],'herramienta_protoformas')

      return x

def cierraconexion(conex):
    conex.close()


#**************************************************
#FUNCIÓN QUE DEVUELVE LOS USUARIOS TOTALES QUE SE ENCUENTRAN EN LA TABLA USUARIOS
#**************************************************
def dameUsuarios():

      usuarios=[]

      hostMySQL,portMySQL,userMySQL,passwordMySQL= conecta_bbdd.dameDatosConexion()
      
      hostMySQL=hostMySQL[:-1]
      userMySQL=userMySQL[:-1]
      passwordMySQL=passwordMySQL[:-1]
 

      x = conecta_bbdd.conecta_mysql(hostMySQL,userMySQL,passwordMySQL,'herramienta_protoformas')


      cursor= x.cursor()
      cursor.execute("select * from Usuarios order by login")


      for row in cursor.fetchall():
         usuarios.append(row)
       

      x.close()
      return usuarios


print(dameUsuarios())

