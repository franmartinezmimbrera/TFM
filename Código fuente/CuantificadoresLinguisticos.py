#Clase que representa a una variable lingüística
import conecta_bbdd
class CuantificadorLinguistico:

    def __init__(self):
        self.login=""     #Login del usuario
        self.Nombre = ""  # Nombre del cuantificador
        self.A=""    #Valor a de la función de pertenencia trapezoidal
        self.B=""  #Valor b de la función de pertenencia trapezoidal
        self.C=""  #Valor c de la función de pertenencia trapezoidal
        self.D=""  #Valor d de la función de pertenencia trapezoidal

    def set(self,nombreQ,loginU,aTL,bTL,cTL,dTL):
        self.login=loginVL
        self.Nombre = nombreQ
        self.A=aTL
        self.B=bTL
        self.C=cTL
        self.D=dTL


    def loadToBBDD(self,nombreQ,loginU):

        hostMySQL,portMySQL,userMySQL,passwordMySQL= conecta_bbdd.dameDatosConexion()
      
        hostMySQL=hostMySQL[:-1]
        userMySQL=userMySQL[:-1]
        passwordMySQL=passwordMySQL[:-1]
 
        x = conecta_bbdd.conecta_mysql(hostMySQL,userMySQL,passwordMySQL,'herramienta_protoformas')

        cursor= x.cursor()
        cursor.execute("select Nombre,Login,A,B,C,D from CuantificadoresLingüísticos where Login='" + loginU + "' and Nombre='" + nombreQ + "' and borrado=0")
      
        existe=0
        for row in cursor.fetchall():
            existe=1
            self.Nombre = row[0]
            self.login=row[1]
            self.A=row[2]
            self.B=row[3]
            self.C=row[4]
            self.D=row[5]

        x.close()
        return existe

    def setToBBDD(self):

        hostMySQL,portMySQL,userMySQL,passwordMySQL= conecta_bbdd.dameDatosConexion()
      
        hostMySQL=hostMySQL[:-1]
        userMySQL=userMySQL[:-1]
        passwordMySQL=passwordMySQL[:-1]
 
        x = conecta_bbdd.conecta_mysql(hostMySQL,userMySQL,passwordMySQL,'herramienta_protoformas')

        cursor= x.cursor()
        cursor.execute("INSERT INTO CuantificadoresLingüísticos (Nombre,Login,A,B,C,D) VALUES (%s,%s,%s,%s,%s,%s)",(self.Nombre,self.login,self.A,self.B,self.C,self.D))
        x.commit()
       
        x.close()

    def updateQLToBBDD(self):

        hostMySQL,portMySQL,userMySQL,passwordMySQL= conecta_bbdd.dameDatosConexion()
      
        hostMySQL=hostMySQL[:-1]
        userMySQL=userMySQL[:-1]
        passwordMySQL=passwordMySQL[:-1]
 
        x = conecta_bbdd.conecta_mysql(hostMySQL,userMySQL,passwordMySQL,'herramienta_protoformas')

        cursor= x.cursor()
        cursor.execute("UPDATE CuantificadoresLingüísticos SET Nombre=%s,A=%s,B=%s,C=%s,D=%d where Nombre=%s and Login=%s ",(self.Nombre,self.A,self.B,self.C,self.D,self.Nombre,self.login))
        x.commit()
        
        x.close()


    def deleteVTtoBBDD(self,nombreQL,loginU):

        hostMySQL,portMySQL,userMySQL,passwordMySQL= conecta_bbdd.dameDatosConexion()
      
        hostMySQL=hostMySQL[:-1]
        userMySQL=userMySQL[:-1]
        passwordMySQL=passwordMySQL[:-1]
 
        x = conecta_bbdd.conecta_mysql(hostMySQL,userMySQL,passwordMySQL,'herramienta_protoformas')

        cursor= x.cursor()
        cursor.execute("UPDATE CuantificadoresLingüísticos SET borrado=1 where Nombre='" + nombreQL + "' and Login='" + loginU + "'")
        x.commit()
        
        x.close()

    def setNombreCuantificador(self,nombreQL):
        self.Nombre=nombreQL

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

    def getNombreCuantificador(self):
        return self.Nombre


    def getAllQLToBBDD(self):

        QLs=[]
        hostMySQL,portMySQL,userMySQL,passwordMySQL= conecta_bbdd.dameDatosConexion()
      
        hostMySQL=hostMySQL[:-1]
        userMySQL=userMySQL[:-1]
        passwordMySQL=passwordMySQL[:-1]

        x = conecta_bbdd.conecta_mysql(hostMySQL,userMySQL,passwordMySQL,'herramienta_protoformas')
     
        cursor= x.cursor()
        cursor.execute("select Nombre,Login,A,B,C,D from CuantificadoresLingüísticos where borrado=0 and Login=%s",self.login)
      
        for row in cursor.fetchall():
            nuevo=CuantificadorLinguistico()
            nuevo.set(row[0],row[1],row[2],row[3],row[4],row[5])
            QLs.append(nuevo)
       
        x.close()

        return QLs

