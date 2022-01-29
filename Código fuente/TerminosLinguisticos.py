#Clase que representa a una variable lingüística
import conecta_bbdd
class TerminoLinguistico:

    def __init__(self):
        self.login=""     #Login del usuario
        self.nombreT = ""  # Nombre del término
        self.nombreVL = "" # Nombre de la variable lingüística
        self.A=""    #Valor a de la función de pertenencia trapezoidal
        self.B=""  #Valor b de la función de pertenencia trapezoidal
        self.C=""  #Valor c de la función de pertenencia trapezoidal
        self.D=""  #Valor d de la función de pertenencia trapezoidal


    def set(self,nombreTL,nombreVLT,loginVL,aTL,bTL,cTL,dTL):
        self.login=loginVL
        self.nombreT = nombreTL
        self.nombreVL=nombreVLT
        self.A=aTL
        self.B=bTL
        self.C=cTL
        self.D=dTL


    def loadToBBDD(self,nombreTL,nombreVLT,loginVL):

        hostMySQL,portMySQL,userMySQL,passwordMySQL= conecta_bbdd.dameDatosConexion()
      
        hostMySQL=hostMySQL[:-1]
        userMySQL=userMySQL[:-1]
        passwordMySQL=passwordMySQL[:-1]
 
        x = conecta_bbdd.conecta_mysql(hostMySQL,userMySQL,passwordMySQL,'herramienta_protoformas')

        cursor= x.cursor()
        cursor.execute("select NombreT,NombreVL,Login,A,B,C,D from TérminosLingüísticos where Login='" + loginVL + "' and NombreT='" + nombreTL + "' and NombreVL='"+ nombreVLT + "' and borrado=0")
      
        existe=0
        for row in cursor.fetchall():
            existe=1
            self.nombreT = row[0]
            self.nombreVL= row[1]
            self.login=row[2]
            self.A=row[3]
            self.B=row[4]
            self.C=row[5]
            self.D=row[6]

        x.close()
        return existe

    def setToBBDD(self):

        hostMySQL,portMySQL,userMySQL,passwordMySQL= conecta_bbdd.dameDatosConexion()
      
        hostMySQL=hostMySQL[:-1]
        userMySQL=userMySQL[:-1]
        passwordMySQL=passwordMySQL[:-1]
 
        x = conecta_bbdd.conecta_mysql(hostMySQL,userMySQL,passwordMySQL,'herramienta_protoformas')

        cursor= x.cursor()
        cursor.execute("INSERT INTO TérminosLingüísticos (NombreT,NombreVL,Login,A,B,C,D) VALUES (%s,%s,%s,%s,%s,%s,%s)",(self.nombreT,self.nombreVL,self.login,self.A,self.B,self.C,self.D))
        x.commit()
       
        x.close()

    def updateTLToBBDD(self):

        hostMySQL,portMySQL,userMySQL,passwordMySQL= conecta_bbdd.dameDatosConexion()
      
        hostMySQL=hostMySQL[:-1]
        userMySQL=userMySQL[:-1]
        passwordMySQL=passwordMySQL[:-1]
 
        x = conecta_bbdd.conecta_mysql(hostMySQL,userMySQL,passwordMySQL,'herramienta_protoformas')

        cursor= x.cursor()
        cursor.execute("UPDATE TérminosLingüísticos SET NombreT=%s,A=%s,B=%s,C=%s,D=%d where NombreT=%s and NombreVT=%s and Login=%s ",(self.nombreT,self.A,self.B,self.C,self.D,self.nombreT,self.nombreVL,self.login))
        x.commit()
        
        x.close()


    def deleteTLtoBBDD(self,nombreTL,nombreVLT,loginVL):

        hostMySQL,portMySQL,userMySQL,passwordMySQL= conecta_bbdd.dameDatosConexion()
      
        hostMySQL=hostMySQL[:-1]
        userMySQL=userMySQL[:-1]
        passwordMySQL=passwordMySQL[:-1]
 
        x = conecta_bbdd.conecta_mysql(hostMySQL,userMySQL,passwordMySQL,'herramienta_protoformas')

        cursor= x.cursor()
        cursor.execute("UPDATE TérminosLingüísticos SET borrado=1 where NombreT='" + nombreTL + "' and NombreVL='" + nombreVLT + "' and Login='" + loginVL + "'")
        x.commit()
        
        x.close()

    def setNombre(self,nombreTL):
        self.nombre=nombreTL

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

    def getNombreT(self):
        return self.nombreT


    def getAllVLToBBDD(self):

        TLs=[]
        hostMySQL,portMySQL,userMySQL,passwordMySQL= conecta_bbdd.dameDatosConexion()
      
        hostMySQL=hostMySQL[:-1]
        userMySQL=userMySQL[:-1]
        passwordMySQL=passwordMySQL[:-1]

        x = conecta_bbdd.conecta_mysql(hostMySQL,userMySQL,passwordMySQL,'herramienta_protoformas')
     
        cursor= x.cursor()
        cursor.execute("select NombreT,NombreVL,Login,A,B,C,D from TérminosLingüísticos where borrado=0 and Login=%s",self.login)
      
        for row in cursor.fetchall():
            nuevo=TerminoLinguistico()
            nuevo.set(row[0],row[1],row[2],row[3],row[4],row[5],row[6])
            TLs.append(nuevo)
       
        x.close()

        return TLs



