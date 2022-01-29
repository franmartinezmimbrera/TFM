#Clase que representa a un conjunto de datos
import conecta_bbdd
class Problema:

    def __init__(self):
        self.id=-1     #id problema
        self.Descripción = ""  #Descripción problema
        self.login=""
       

    def set(self,idC,DescripciónP,loginC):
        self.id=idC
        self.login=loginC
        self.Descripción=DescripciónP


    def loadToBBDD(self,idP):

      hostMySQL,portMySQL,userMySQL,passwordMySQL= conecta_bbdd.dameDatosConexion()
      
      hostMySQL=hostMySQL[:-1]
      userMySQL=userMySQL[:-1]
      passwordMySQL=passwordMySQL[:-1]
 
      x = conecta_bbdd.conecta_mysql(hostMySQL,userMySQL,passwordMySQL,'herramienta_protoformas')

      cursor= x.cursor()
      cursor.execute("select Descripcion,login from Problemas where id=%s",idP )
      
      existe=0
      for row in cursor.fetchall():
        existe=1
        self.id=idP
        self.Descripción = row[0]
        self.login=row[1]
      x.close()
      return existe

    def setToBBDD(self):

        hostMySQL,portMySQL,userMySQL,passwordMySQL= conecta_bbdd.dameDatosConexion()
      
        hostMySQL=hostMySQL[:-1]
        userMySQL=userMySQL[:-1]
        passwordMySQL=passwordMySQL[:-1]
 
        x = conecta_bbdd.conecta_mysql(hostMySQL,userMySQL,passwordMySQL,'herramienta_protoformas')

        cursor= x.cursor()
        cursor.execute("INSERT INTO Problemas (Descripción,Login) VALUES (%s,%s)",(self.Descripción,self.login))
        x.commit()
       
        x.close()

    def updateProBToBBDD(self):

        hostMySQL,portMySQL,userMySQL,passwordMySQL= conecta_bbdd.dameDatosConexion()
      
        hostMySQL=hostMySQL[:-1]
        userMySQL=userMySQL[:-1]
        passwordMySQL=passwordMySQL[:-1]
 
        x = conecta_bbdd.conecta_mysql(hostMySQL,userMySQL,passwordMySQL,'herramienta_protoformas')

        cursor= x.cursor()
        cursor.execute("UPDATE Problemas SET Descripción=%s,Login=%s where ID=%s",(self.Descripción,self.login,self.id))
        x.commit()
        
        x.close()


    def deleteProBToBBDD(self,idU):

        hostMySQL,portMySQL,userMySQL,passwordMySQL= conecta_bbdd.dameDatosConexion()
      
        hostMySQL=hostMySQL[:-1]
        userMySQL=userMySQL[:-1]
        passwordMySQL=passwordMySQL[:-1]
 
        x = conecta_bbdd.conecta_mysql(hostMySQL,userMySQL,passwordMySQL,'herramienta_protoformas')

        cursor= x.cursor()
        cursor.execute("UPDATE Problemas SET borrado=1 where id=%s",idU)
        x.commit()
        
        x.close()


    def setDescripción(self,Descripcion):
         self.Descripción=Descripcion

    def getLogin(self):
        return self.login


    def getAllSetToBBDD(self):

        Prob=[]
        hostMySQL,portMySQL,userMySQL,passwordMySQL= conecta_bbdd.dameDatosConexion()
      
        hostMySQL=hostMySQL[:-1]
        userMySQL=userMySQL[:-1]
        passwordMySQL=passwordMySQL[:-1]

        x = conecta_bbdd.conecta_mysql(hostMySQL,userMySQL,passwordMySQL,'herramienta_protoformas')
     
        cursor= x.cursor()
        cursor.execute("select Id,Descripción,Login from Problemas where borrado=0 and Login=%s",self.login)
      
        for row in cursor.fetchall():
            nuevo=Problema()
            nuevo.set(row[0],row[1],row[2])
            Prob.append(nuevo)
       
        x.close()

        return Prob