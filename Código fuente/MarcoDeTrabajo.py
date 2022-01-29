#Clase que representa a un conjunto de datos
import conecta_bbdd
class Marco:

    def __init__(self):
        self.idP=-1     #id problema
        self.idC=-1
        self.NombreP=""
        self.login=""
       

    def set(self,idPo,idCo,NombrePr,loginP):
        self.idP=idPo     #id problema
        self.idC=idCo
        self.NombreP=NombrePr
        self.login=loginP


    def setToBBDD(self):

        hostMySQL,portMySQL,userMySQL,passwordMySQL= conecta_bbdd.dameDatosConexion()
      
        hostMySQL=hostMySQL[:-1]
        userMySQL=userMySQL[:-1]
        passwordMySQL=passwordMySQL[:-1]
 
        x = conecta_bbdd.conecta_mysql(hostMySQL,userMySQL,passwordMySQL,'herramienta_protoformas')

        cursor= x.cursor()
        cursor.execute("INSERT INTO MarcoDeTrabajo (Login,NombreP,IDProblema,IDCD) VALUES (%s,%s,%s,%s)",(self.login,self.NombreP,self.idP,self.idC))
        x.commit()
       
        x.close()

    def deleteMarcoToBBDD(self,idc,idp,nombrep,loginu):

        hostMySQL,portMySQL,userMySQL,passwordMySQL= conecta_bbdd.dameDatosConexion()
      
        hostMySQL=hostMySQL[:-1]
        userMySQL=userMySQL[:-1]
        passwordMySQL=passwordMySQL[:-1]
 
        x = conecta_bbdd.conecta_mysql(hostMySQL,userMySQL,passwordMySQL,'herramienta_protoformas')

        cursor= x.cursor()
        cursor.execute("DELETE FROM MarcoDeTrabajo where IDCD=%s and NombreP=%s and Login=%s and IDProblema=%s",idc,nombrep,loginu,idp)
        x.commit()
        
        x.close()


    def getAllMarcoToBBDD(self):

        Marcos=[]
        hostMySQL,portMySQL,userMySQL,passwordMySQL= conecta_bbdd.dameDatosConexion()
      
        hostMySQL=hostMySQL[:-1]
        userMySQL=userMySQL[:-1]
        passwordMySQL=passwordMySQL[:-1]

        x = conecta_bbdd.conecta_mysql(hostMySQL,userMySQL,passwordMySQL,'herramienta_protoformas')
     
        cursor= x.cursor()
        cursor.execute("select IDProblema,IDCD,,NombreP,Login from MarcoDeTrabajo where Login=%s",self.login)
      
        for row in cursor.fetchall():
            nuevo=Marco()
            nuevo.set(row[0],row[1],row[2],row[3])
            Marcos.append(nuevo)
       
        x.close()

        return Marcos