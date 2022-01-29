#Clase que representa a una variable lingüística
import conecta_bbdd
import TerminosLinguisticos
class VariableLinguistica:

    def __init__(self):
        self.login=""     #Login del usuario
        self.nombre = ""  # Nombre de la Variable

    def set(self,nombreVL,loginVL):
        self.login=loginVL
        self.nombre = nombreVL


    def loadToBBDD(self,nombreVL,loginU):

        hostMySQL,portMySQL,userMySQL,passwordMySQL= conecta_bbdd.dameDatosConexion()
      
        hostMySQL=hostMySQL[:-1]
        userMySQL=userMySQL[:-1]
        passwordMySQL=passwordMySQL[:-1]
 
        x = conecta_bbdd.conecta_mysql(hostMySQL,userMySQL,passwordMySQL,'herramienta_protoformas')

        cursor= x.cursor()
        cursor.execute("select Nombre,Login from VariablesLingüísticas where Login='" + loginU + "' and Nombre='" + nombreVL + "' and borrado=0")
      
        existe=0
        for row in cursor.fetchall():
            existe=1
            self.nombre = row[0]
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
        cursor.execute("INSERT INTO VariablesLingüísticas (Nombre,login) VALUES (%s,%s)",(self.nombre,self.nombre))
        x.commit()
       
        x.close()

    def updateVLToBBDD(self):

        hostMySQL,portMySQL,userMySQL,passwordMySQL= conecta_bbdd.dameDatosConexion()
      
        hostMySQL=hostMySQL[:-1]
        userMySQL=userMySQL[:-1]
        passwordMySQL=passwordMySQL[:-1]
 
        x = conecta_bbdd.conecta_mysql(hostMySQL,userMySQL,passwordMySQL,'herramienta_protoformas')

        cursor= x.cursor()
        cursor.execute("UPDATE VariablesLingüísticas SET Nombre=%s, Login=%s where login=%s and Nombre=%s",(self.nombre,self.login,self.login,self.nombre))
        x.commit()
        
        x.close()


    def deleteVLToBBDD(self,nombreVL,loginU):

        hostMySQL,portMySQL,userMySQL,passwordMySQL= conecta_bbdd.dameDatosConexion()
      
        hostMySQL=hostMySQL[:-1]
        userMySQL=userMySQL[:-1]
        passwordMySQL=passwordMySQL[:-1]
 
        x = conecta_bbdd.conecta_mysql(hostMySQL,userMySQL,passwordMySQL,'herramienta_protoformas')

        cursor= x.cursor()
        cursor.execute("UPDATE VariablesLingüísticas SET borrado=1 where Nombre='"+ nombreVL + "' andLogin='" + loginU + "'")
        x.commit()
        
        x.close()

    def setNombre(self,nombreVL):
        self.nombre=nombreVL

    def getLogin(self):
        return self.login

    def getNombre(self):
        return self.nombre


    def getAllVLToBBDD(self):

        VLs=[]
        hostMySQL,portMySQL,userMySQL,passwordMySQL= conecta_bbdd.dameDatosConexion()
      
        hostMySQL=hostMySQL[:-1]
        userMySQL=userMySQL[:-1]
        passwordMySQL=passwordMySQL[:-1]

        x = conecta_bbdd.conecta_mysql(hostMySQL,userMySQL,passwordMySQL,'herramienta_protoformas')
     
        cursor= x.cursor()
        cursor.execute("select Nombre,Login from VariablesLingüísticas where borrado=0 and Login=%s",self.login)
      
        for row in cursor.fetchall():
            nuevo=VariableLinguistica()
            nuevo.set(row[0],row[1])
            VLs.append(nuevo)
       
        x.close()

        return VLs


    def getAllTerminos(self):

        Terminos=[]
        hostMySQL,portMySQL,userMySQL,passwordMySQL= conecta_bbdd.dameDatosConexion()
      
        hostMySQL=hostMySQL[:-1]
        userMySQL=userMySQL[:-1]
        passwordMySQL=passwordMySQL[:-1]

        x = conecta_bbdd.conecta_mysql(hostMySQL,userMySQL,passwordMySQL,'herramienta_protoformas')

        cursor= x.cursor()
        cursor.execute("select NombreT,NombreVL,Login,A,B,C,D from TérminosLingüísticos where Login='" + self.login + "' and NombreVL='"+ self.nombre + "' and borrado=0")
    
        
        for row in cursor.fetchall():
            aux=TerminosLinguisticos.TerminoLinguistico()
            aux.set(row[0],row[1],row[2],row[3],row[4],row[5],row[6])
            Terminos.append(aux)
        
        x.close()

        return Terminos
