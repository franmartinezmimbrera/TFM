#Clase que representa a un sensor
import conecta_bbdd
class Sensor:

    def __init__(self):
        self.login=""     #Login del usuario
        self.ID_SENSOR = -1  # id sensor
        self.Descripcion=""
        self.max=-1
        self.min=-1
        self.intervalos=-1
        self.tmuestra=-1

    def set(self,ID,Des,loginU,M,MN,I,T):
        self.login=loginU
        self.ID_SENSOR=ID
        self.Descripcion=Des
        self.max=M
        self.min=MN
        self.intervalos=I
        self.tmuestra=T


    def loadToBBDD(self,ID_SENSOR,loginU):

        hostMySQL,portMySQL,userMySQL,passwordMySQL= conecta_bbdd.dameDatosConexion()
      
        hostMySQL=hostMySQL[:-1]
        userMySQL=userMySQL[:-1]
        passwordMySQL=passwordMySQL[:-1]
 
        x = conecta_bbdd.conecta_mysql(hostMySQL,userMySQL,passwordMySQL,'herramienta_protoformas')

        cursor= x.cursor()
        cursor.execute("select ID_SENSOR,Descripcion,max,min,intervalos,tmuestra from Sensores where Login='" + loginU + "' and ID_SENSOR='" + ID_SENSOR + "' and borrado=0")
      
        existe=0
        for row in cursor.fetchall():
            existe=1
            self.ID_SENSOR = row[0]
            self.login=loginU
            self.Descripcion=row[1]
            self.max=row[2]
            self.min=row[3]
            self.intervalos=row[4]
            self.tmuestra=row[5]

        x.close()
        return existe

    def getDescripcion(self):
        return self.Descripcion 
    def getMax(self):
        return self.max
    def getMin(self):
        return self.min
    def getIntervalos(self):
        return self.intervalos

    def getTmuestra(self):
        return self.tmuestra 

    def getLogin(self):
        return self.login

