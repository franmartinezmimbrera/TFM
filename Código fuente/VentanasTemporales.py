#Clase que representa a una variable lingüística
import conecta_bbdd
class VentanaTemporal:

    def __init__(self):
        self.login=""     #Login del usuario
        self.NVentana = ""  # Nombre de la ventana
        self.A=0    #Valor a de la función de pertenencia trapezoidal
        self.B=0  #Valor b de la función de pertenencia trapezoidal
        self.C=0  #Valor c de la función de pertenencia trapezoidal
        self.D=0  #Valor d de la función de pertenencia trapezoidal
        self.tiempo=0

    def set(self,nombreV,loginU,aTL,bTL,cTL,dTL,time):
        self.login=loginU
        self.NVentana = nombreV
        self.A=aTL
        self.B=bTL
        self.C=cTL
        self.D=dTL
        self.tiempo=time


    def loadToBBDD(self,nombreV,loginU):

        hostMySQL,portMySQL,userMySQL,passwordMySQL= conecta_bbdd.dameDatosConexion()
      
        hostMySQL=hostMySQL[:-1]
        userMySQL=userMySQL[:-1]
        passwordMySQL=passwordMySQL[:-1]
 
        x = conecta_bbdd.conecta_mysql(hostMySQL,userMySQL,passwordMySQL,'herramienta_protoformas')

        cursor= x.cursor()
        cursor.execute("select NVentana,Login,A,B,C,D,Tiempo from VentanasTemporales where Login='" + loginU + "' and NVentana='" + nombreV + "' and borrado=0")
      
        existe=0
        for row in cursor.fetchall():
            existe=1
            self.NVentana = row[0]
            self.login=row[1]
            self.A=row[2]
            self.B=row[3]
            self.C=row[4]
            self.D=row[5]
            self.tiempo=row[6]

        x.close()
        return existe

    def setToBBDD(self):

        hostMySQL,portMySQL,userMySQL,passwordMySQL= conecta_bbdd.dameDatosConexion()
      
        hostMySQL=hostMySQL[:-1]
        userMySQL=userMySQL[:-1]
        passwordMySQL=passwordMySQL[:-1]
 
        x = conecta_bbdd.conecta_mysql(hostMySQL,userMySQL,passwordMySQL,'herramienta_protoformas')

        cursor= x.cursor()
        cursor.execute("INSERT INTO VentanasTemporales (NVentana,Login,A,B,C,D,tiempo) VALUES (%s,%s,%s,%s,%s,%s,%s)",(self.NVentana,self.login,self.A,self.B,self.C,self.D,self.tiempo))
        x.commit()
       
        x.close()

    def updateVTToBBDD(self):

        hostMySQL,portMySQL,userMySQL,passwordMySQL= conecta_bbdd.dameDatosConexion()
      
        hostMySQL=hostMySQL[:-1]
        userMySQL=userMySQL[:-1]
        passwordMySQL=passwordMySQL[:-1]
 
        x = conecta_bbdd.conecta_mysql(hostMySQL,userMySQL,passwordMySQL,'herramienta_protoformas')

        cursor= x.cursor()
        cursor.execute("UPDATE VentanasTemporales SET NVentana=%s,A=%s,B=%s,C=%s,D=%d,tiempo=%s where NVentana=%s and Login=%s ",(self.NVentana,self.A,self.B,self.C,self.D,self.tiempo,self.NVentana,self.login))
        x.commit()
        
        x.close()


    def deleteVTtoBBDD(self,nombreV,loginU):

        hostMySQL,portMySQL,userMySQL,passwordMySQL= conecta_bbdd.dameDatosConexion()
      
        hostMySQL=hostMySQL[:-1]
        userMySQL=userMySQL[:-1]
        passwordMySQL=passwordMySQL[:-1]
 
        x = conecta_bbdd.conecta_mysql(hostMySQL,userMySQL,passwordMySQL,'herramienta_protoformas')

        cursor= x.cursor()
        cursor.execute("UPDATE VentanasTemoprales SET borrado=1 where NVentana='" + nombreV + "' and Login='" + loginU + "'")
        x.commit()
        
        x.close()

    def setNombreVentana(self,nombreV):
        self.NVentana=nombreV

    def setA(self,aTL):
        self.A=aTL        
    def setB(self,bTL):
        self.B=bTL  
    def setA(self,cTL):
        self.C=cTL  
    def setA(self,dTL):
        self.D=dTL  

    def getA(self):
        return self.A 
    def getB(self):
        return self.B 
    def getC(self):
        return self.C 
    def getD(self):
        return self.D 

    def getLogin(self):
        return self.login

    def getNombreVentana(self):
        return self.NVentana

    def getTiempo(self):
        return self.tiempo

    def getAllVLToBBDD(self):

        VTs=[]
        hostMySQL,portMySQL,userMySQL,passwordMySQL= conecta_bbdd.dameDatosConexion()
      
        hostMySQL=hostMySQL[:-1]
        userMySQL=userMySQL[:-1]
        passwordMySQL=passwordMySQL[:-1]

        x = conecta_bbdd.conecta_mysql(hostMySQL,userMySQL,passwordMySQL,'herramienta_protoformas')
     
        cursor= x.cursor()
        cursor.execute("select NVentana,Login,A,B,C,D,tiempo from VentanasTemporales where borrado=0 and Login=%s",self.login)
      
        for row in cursor.fetchall():
            nuevo=VentanaTemporal()
            nuevo.set(row[0],row[1],row[2],row[3],row[4],row[5],row[6])
            VTs.append(nuevo)
       
        x.close()

        return VTs

