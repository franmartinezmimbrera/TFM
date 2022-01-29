#Clase que representa a un conjunto de datos
import conecta_bbdd
class ConjuntoDatos:

    def __init__(self):
        self.id=-1     #id conjunto
        self.nombre = ""  # Nombre del conjunto
        self.ruta="" # ruta del fichero
        self.login=""     # Usuario creador del conjunto.
        self.tipo="HISTÓRICO"
        self.DatosBBDD=""

    def set(self,idC,nombreC,rutaC,loginC,tipoC,DatosBBDDC):
        self.id=idC
        self.login=loginC
        self.nombre = nombreC
        self.ruta=rutaC  #La ruta ya nos viene dada después de que el fichero haya sido subido al servidor.
        self.tipo=tipoC
        self.DatosBBDD=DatosBBDDC

    def loadToBBDD(self,idC):

      hostMySQL,portMySQL,userMySQL,passwordMySQL= conecta_bbdd.dameDatosConexion()
      
      hostMySQL=hostMySQL[:-1]
      userMySQL=userMySQL[:-1]
      passwordMySQL=passwordMySQL[:-1]
 
      x = conecta_bbdd.conecta_mysql(hostMySQL,userMySQL,passwordMySQL,'herramienta_protoformas')

      cursor= x.cursor()
      cursor.execute("select Nombre,Ruta,Login,Tipo,DatosBBDD from ConjuntosDatos where id=%s",idC )
      
      existe=0
      for row in cursor.fetchall():
        existe=1
        self.id=idC
        self.nombre = row[0]
        self.ruta=row[1]
        self.login=row[2]
        self.tipo=row[3]
        self.DatosBBDD=row[4]
      x.close()
      return existe

    def setToBBDD(self):

        hostMySQL,portMySQL,userMySQL,passwordMySQL= conecta_bbdd.dameDatosConexion()
      
        hostMySQL=hostMySQL[:-1]
        userMySQL=userMySQL[:-1]
        passwordMySQL=passwordMySQL[:-1]
 
        x = conecta_bbdd.conecta_mysql(hostMySQL,userMySQL,passwordMySQL,'herramienta_protoformas')

        cursor= x.cursor()
        cursor.execute("INSERT INTO ConjuntosDatos (Nombre,Ruta,Login,Tipo.DatosBBDD) VALUES (%s,%s,%s)",(self.nombre,self.ruta,self.login,self.tipo,self.DatosBBDD))
        x.commit()
       
        x.close()

    def updateSetToBBDD(self):

        hostMySQL,portMySQL,userMySQL,passwordMySQL= conecta_bbdd.dameDatosConexion()
      
        hostMySQL=hostMySQL[:-1]
        userMySQL=userMySQL[:-1]
        passwordMySQL=passwordMySQL[:-1]
 
        x = conecta_bbdd.conecta_mysql(hostMySQL,userMySQL,passwordMySQL,'herramienta_protoformas')

        cursor= x.cursor()
        cursor.execute("UPDATE ConjuntosDatos SET Nombre=%s, Ruta=%s, Login=%s , Tipo=%s, DatosBBDD=%s where ID=%s",(self.nombre,self.ruta,self.login,self.id,self.tipo,self.DatosBBDD))
        x.commit()
        
        x.close()


    def deleteSetToBBDD(self,idU):

        hostMySQL,portMySQL,userMySQL,passwordMySQL= conecta_bbdd.dameDatosConexion()
      
        hostMySQL=hostMySQL[:-1]
        userMySQL=userMySQL[:-1]
        passwordMySQL=passwordMySQL[:-1]
 
        x = conecta_bbdd.conecta_mysql(hostMySQL,userMySQL,passwordMySQL,'herramienta_protoformas')

        cursor= x.cursor()
        cursor.execute("UPDATE ConjutosDatos SET borrado=1 where id=%s",idU)
        x.commit()
        
        x.close()


    def setNombre(self,nombreU):
         self.nombre=nombreU

    def setRuta(self,rutaU):
         self.ruta=rutaU

    def getLogin(self):
        return self.login

    def getNombre(self):
        return self.nombre

    def getRuta(self):
        return self.ruta
    def getTipo(self):
        return self.tipo

    def getDatosBBDD(self):
        return self.DatosBBDD

    def getAllSetToBBDD(self):

        conjuntos=[]
        hostMySQL,portMySQL,userMySQL,passwordMySQL= conecta_bbdd.dameDatosConexion()
      
        hostMySQL=hostMySQL[:-1]
        userMySQL=userMySQL[:-1]
        passwordMySQL=passwordMySQL[:-1]

        x = conecta_bbdd.conecta_mysql(hostMySQL,userMySQL,passwordMySQL,'herramienta_protoformas')
     
        cursor= x.cursor()
        cursor.execute("select Id,Nombre,Ruta,Login from ConjuntosDatos where borrado=0 and Login=%s",self.login)
      
        for row in cursor.fetchall():
            nuevo=ConjuntoDatos()
            nuevo.set(row[0],row[1],row[2],row[3])
            conjuntos.append(nuevo)
       
        x.close()

        return conjuntos