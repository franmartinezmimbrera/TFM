#Clase que representa a una variable lingüística
import conecta_bbdd
class Protoforma:

    def __init__(self):
        self.login=""     #Login del usuario
        self.Nombre = ""  # Nombre de Protoforma
        self.QLinguistico=""
        self.VLinguistica=""
        self.VTemporal=""
        self.Termino=""
        

    def set(self,nombreP,loginU,QL,VL,VT,T):
        self.login=loginU
        self.Nombre = nombreP
        self.QLinguistico=QL
        self.VLinguistica=VL
        self.VTemporal=VT
        self.Termino=T


    def loadToBBDD(self,nombreP,loginU):

        hostMySQL,portMySQL,userMySQL,passwordMySQL= conecta_bbdd.dameDatosConexion()
      
        hostMySQL=hostMySQL[:-1]
        userMySQL=userMySQL[:-1]
        passwordMySQL=passwordMySQL[:-1]
 
        x = conecta_bbdd.conecta_mysql(hostMySQL,userMySQL,passwordMySQL,'herramienta_protoformas')

        cursor= x.cursor()
        cursor.execute("select Nombre,Login,QLingüístico,VLingüistica,VTemporal,TLinguistico from Protoformas where Login='" + loginU + "' and Nombre='" + nombreP + "' and borrado=0")
      
        existe=0
        for row in cursor.fetchall():
            existe=1
            self.Nombre = row[0]
            self.login=row[1]
            self.QLinguistico=row[2]
            self.VLinguistica=row[3]
            self.VTemporal=row[4]
            self.TLinguistico=row[5]

        x.close()
        return existe

    def setToBBDD(self):

        hostMySQL,portMySQL,userMySQL,passwordMySQL= conecta_bbdd.dameDatosConexion()
      
        hostMySQL=hostMySQL[:-1]
        userMySQL=userMySQL[:-1]
        passwordMySQL=passwordMySQL[:-1]
 
        x = conecta_bbdd.conecta_mysql(hostMySQL,userMySQL,passwordMySQL,'herramienta_protoformas')

        cursor= x.cursor()
        cursor.execute("INSERT INTO Protoformas (Nombre,Login,QLinguistico,VLinguistica,VTemporal,TLinguistico) VALUES (%s,%s,%s,%s,%s,%s)",(self.Nombre,self.login,self.QLinguistico,self.VLinguistica,self.VTemporal,self.TLinguistico ))
        x.commit()
       
        x.close()

    def updatePToBBDD(self):

        hostMySQL,portMySQL,userMySQL,passwordMySQL= conecta_bbdd.dameDatosConexion()
      
        hostMySQL=hostMySQL[:-1]
        userMySQL=userMySQL[:-1]
        passwordMySQL=passwordMySQL[:-1]
 
        x = conecta_bbdd.conecta_mysql(hostMySQL,userMySQL,passwordMySQL,'herramienta_protoformas')

        cursor= x.cursor()
        cursor.execute("UPDATE Protoformas SET Nombre=%s,QLinguistico=%s,VLinguistica=%s,VTemporal=%s where Nombre=%s and Login=%s ",(self.Nombre,self.QLinguistico,self.VLinguistica,self.VTemporal,self.Nombre,self.login))
        x.commit()
        
        x.close()


    def deletePtoBBDD(self,nombreP,loginU):

        hostMySQL,portMySQL,userMySQL,passwordMySQL= conecta_bbdd.dameDatosConexion()
      
        hostMySQL=hostMySQL[:-1]
        userMySQL=userMySQL[:-1]
        passwordMySQL=passwordMySQL[:-1]
 
        x = conecta_bbdd.conecta_mysql(hostMySQL,userMySQL,passwordMySQL,'herramienta_protoformas')

        cursor= x.cursor()
        cursor.execute("UPDATE Protoformas SET borrado=1 where Nombre='" + nombreP + "' and Login='" + loginU + "'")
        x.commit()
        
        x.close()

    def setNombreProtoforma(self,nombreP):
        self.Nombre=nombreP

    def setQLinguistico(self,QL):
        self.QLinguistico=QL        
    def setVLinguistica(self,VL):
        self.VLinguistica=VL  
    def setA(self,VT):
        self.VTemporal=VT  
   
    def getQL(self):
        return self.QLinguistico 
    def getVL(self):
        return self.VLinguistica
    def getVT(self):
        return self.VTemporal
    def getTL(self):
        return self.TLinguistico
        
    def getLogin(self):
        return self.login

    def getNombreProtoforma(self):
        return self.Nombre

    def getAllPToBBDD(self):

        Ps=[]
        hostMySQL,portMySQL,userMySQL,passwordMySQL= conecta_bbdd.dameDatosConexion()
      
        hostMySQL=hostMySQL[:-1]
        userMySQL=userMySQL[:-1]
        passwordMySQL=passwordMySQL[:-1]

        x = conecta_bbdd.conecta_mysql(hostMySQL,userMySQL,passwordMySQL,'herramienta_protoformas')
     
        cursor= x.cursor()
        cursor.execute("select Nombre,Login,QLinguistico,VLinguistica,VTemporal from Protoformas where borrado=0 and Login=%s",self.login)
      
        for row in cursor.fetchall():
            nuevo=Protoforma()
            nuevo.set(row[0],row[1],row[2],row[3],row[4])
            Ps.append(nuevo)
       
        x.close()

        return Ps

