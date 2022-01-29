#Clase que representa a un usuario 
import conecta_bbdd
class Usuario:

    def __init__(self):
        self.login=""     #Login del usuario
        self.password=""  # Password del usuario
        self.nombre = ""  # Nombre del usuario
        self.apellidos="" # Apellidos del usuario
        self.email=""     # Email del usuario.
        self.tipo=""
     

    def set(self,loginU,passwordU,nombreU,apellidosU,emailU,tipoU):
        self.login=loginU
        self.password=passwordU
        self.nombre = nombreU
        self.apellidos=apellidosU
        self.email=emailU
        self.tipo=tipoU

    def loadToBBDD(self,loginU):

        hostMySQL,portMySQL,userMySQL,passwordMySQL= conecta_bbdd.dameDatosConexion()
      
        hostMySQL=hostMySQL[:-1]
        userMySQL=userMySQL[:-1]
        passwordMySQL=passwordMySQL[:-1]
 
        x = conecta_bbdd.conecta_mysql(hostMySQL,userMySQL,passwordMySQL,'herramienta_protoformas')

        cursor= x.cursor()
        cursor.execute("select Login,Password,Nombre,Apellidos,Email,Tipo from Usuarios where login='" + loginU + "' and borrado=0")
      
        existe=0
        for row in cursor.fetchall():
            existe=1
            self.login=row[0]
            self.password=row[1]
            self.nombre = row[2]
            self.apellidos=row[3]
            self.email=row[4]
            self.tipo=row[5]
       
        x.close()
        return existe

    def setToBBDD(self):

        hostMySQL,portMySQL,userMySQL,passwordMySQL= conecta_bbdd.dameDatosConexion()
      
        hostMySQL=hostMySQL[:-1]
        userMySQL=userMySQL[:-1]
        passwordMySQL=passwordMySQL[:-1]
 
        x = conecta_bbdd.conecta_mysql(hostMySQL,userMySQL,passwordMySQL,'herramienta_protoformas')

        cursor= x.cursor()
        cursor.execute("INSERT INTO Usuarios (login,password,nombre,apellidos,email,tipo) VALUES (%s,%s,%s,%s,%s,%s)",(self.login,self.password,self.nombre,self.apellidos,self.email,self.tipo))
        x.commit()
       
        x.close()

    def updateUserToBBDD(self):

        hostMySQL,portMySQL,userMySQL,passwordMySQL= conecta_bbdd.dameDatosConexion()
      
        hostMySQL=hostMySQL[:-1]
        userMySQL=userMySQL[:-1]
        passwordMySQL=passwordMySQL[:-1]
 
        x = conecta_bbdd.conecta_mysql(hostMySQL,userMySQL,passwordMySQL,'herramienta_protoformas')

        cursor= x.cursor()
        cursor.execute("UPDATE Usuarios SET nombre=%s, password=%s, nombre=%s, apellidos=%s, email=%s , tipo=%s, where login=%s",(self.nombre,self.password,self.nombre,self.apellidos,self.email,self.tipo,self.login))
        x.commit()
        
        x.close()


    def deleteUserToBBDD(self,loginU):

        hostMySQL,portMySQL,userMySQL,passwordMySQL= conecta_bbdd.dameDatosConexion()
      
        hostMySQL=hostMySQL[:-1]
        userMySQL=userMySQL[:-1]
        passwordMySQL=passwordMySQL[:-1]
 
        x = conecta_bbdd.conecta_mysql(hostMySQL,userMySQL,passwordMySQL,'herramienta_protoformas')

        cursor= x.cursor()
        cursor.execute("UPDATE Usuarios SET borrado=1 where login='" + loginU + "'")
        x.commit()
        
        x.close()

    
    def setNombre(self,nombreU):
         self.nombre=nombreU

    def setPassword(self,passwordU):
         self.password=passwordU

    def setApellidos(self,apellidosU):
         self.apellidos=apellidosU
    
    def setMail(self,mailU):
         self.email=mailU

    def setTipo(self,tipoU):
         self.tipo=tipoU

    def getLogin(self):
        return self.login

    def getPassword(self):
        return self.password

    def getNombre(self):
        return self.nombre

    def getApellidos(self):
        return self.apellidos

    def getEmail(self):
        return self.email
    def getTipo(self):
        return self.tipo

    def getAllUserToBBDD(self):

        usuarios=[]
        hostMySQL,portMySQL,userMySQL,passwordMySQL= conecta_bbdd.dameDatosConexion()
      
        hostMySQL=hostMySQL[:-1]
        userMySQL=userMySQL[:-1]
        passwordMySQL=passwordMySQL[:-1]

        x = conecta_bbdd.conecta_mysql(hostMySQL,userMySQL,passwordMySQL,'herramienta_protoformas')
     
        cursor= x.cursor()
        cursor.execute("select Login,Password,Nombre,Apellidos,Email,Tipo from Usuarios where borrado=0")
      
        for row in cursor.fetchall():
            nuevo=Usuario()
            nuevo.set(row[0],row[1],row[2],row[3],row[4],row[5])
            usuarios.append(nuevo)
       
        x.close()

        return usuarios



