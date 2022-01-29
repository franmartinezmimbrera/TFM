import skfuzzy as fuzz
import pandas as pd
import Usuarios
import VentanasTemporales
import VariablesLinguisticas
import ConjuntoDatos
import Problemas
import Protoformas
import CuantificadoresLinguisticos
import TerminosLinguisticos
import MarcoDeTrabajo
import numpy as np
import matplotlib.pyplot as plt
import sys
import Sensores

nproto=sys.argv[1]
cd=sys.argv[2]
idsensor=sys.argv[3]


conj=ConjuntoDatos.ConjuntoDatos()
conj.loadToBBDD(cd)

urlcsv=conj.getRuta()
login=conj.getLogin()


df = pd.read_csv(urlcsv,header=None,sep='\t')

#Esto después se podrá quitar.
#df= df.drop(df.columns[[0,3,4]], axis='columns') 

#Esto después se podrá quitar.
df= df.drop(df.columns[[0]], axis='columns') 

#Cargo la protoforma
proto=Protoformas.Protoforma()
proto.loadToBBDD(nproto,login)


usu=Usuarios.Usuario()
usu.loadToBBDD(proto.getLogin())


#Cargo la variable lingüística
varL=VariablesLinguisticas.VariableLinguistica()
varL.set(proto.getVL(),login)

#Cargo los términos asociados que van a ser utilizados
vectorTerminosLinguisticos=varL.getAllTerminos()

#Cargo la Ventana Temporal
Vtemp=VentanasTemporales.VentanaTemporal()
Vtemp.loadToBBDD(proto.getVT(),login)


#HACER UNA FUNCIÓN PARA OBTENER EL MÁXIMO Y MÍNIMO DE LA VARIABLE LINGÜÍSTICA

sensorito=Sensores.Sensor()
sensorito.loadToBBDD(idsensor,login)

x_temp=np.arange(sensorito.getMin(),sensorito.getMax(),sensorito.getIntervalos())

fpvarterminos=[]
fpTL=0
for i in range(len(vectorTerminosLinguisticos)):
       if vectorTerminosLinguisticos[i].getNombreT()==proto.getTL():
          fpTL=fuzz.trapmf(x_temp,[vectorTerminosLinguisticos[i].getA(),vectorTerminosLinguisticos[i].getB(),vectorTerminosLinguisticos[i].getC(),vectorTerminosLinguisticos[i].getD()])     

       fpvarterminos.append(fuzz.trapmf(x_temp,[vectorTerminosLinguisticos[i].getA(),vectorTerminosLinguisticos[i].getB(),vectorTerminosLinguisticos[i].getC(),vectorTerminosLinguisticos[i].getD()]))


fig, (ax0) = plt.subplots(nrows=1, figsize=(8, 4))
if len(vectorTerminosLinguisticos)>=1:
    ax0.plot(x_temp, fpvarterminos[0], 'b', linewidth=1, label=vectorTerminosLinguisticos[0].getNombreT())
if len(vectorTerminosLinguisticos)>=2:
    ax0.plot(x_temp, fpvarterminos[1], 'g', linewidth=1, label=vectorTerminosLinguisticos[1].getNombreT())
if len(vectorTerminosLinguisticos)>=3:
    ax0.plot(x_temp, fpvarterminos[2], 'r', linewidth=1, label=vectorTerminosLinguisticos[2].getNombreT())
if len(vectorTerminosLinguisticos)==4:
    ax0.plot(x_temp, fpvarterminos[3], 'y', linewidth=1, label=vectorTerminosLinguisticos[3].getNombreT())
   


ax0.set_title(varL.getNombre())
ax0.legend()
#plt.show()
plt.savefig("variable.jpg")

print("<p> Variable Lingüística utilizada </p>")
print("<br></br>")
print("<img src='variable.jpg' width='600' height='341'>")
print("<br></br>")

iii=df.iloc[0].iloc[0]  #inicio
xxx=df.iloc[len(df.index)-1].iloc[0] #final

tmuestra=sensorito.getTmuestra()
tjs=Vtemp.getTiempo()

iii=int(iii)
xxx=int(xxx)
tmuestra=int(tmuestra)
tjs=int(tjs)


indiini=0  #primerindice
indifinal=tjs/tmuestra   #indicefinaldelaprimeramuestra
indifinal=int(indifinal)
numpro=0
for ai in range(iii,xxx,tjs):

    
    tinicio=ai
    tsegundo=ai+tmuestra

    tfinal=tinicio+tjs+tmuestra
    

    x_durante=np.arange(tinicio,tfinal,tmuestra)

    VA=tinicio+Vtemp.getA()
    VB=tinicio+Vtemp.getB()
    VC=tinicio+Vtemp.getC()
    VD=tinicio+Vtemp.getD()

    ventanuco=fuzz.trapmf(x_durante,[VA,VB,VC,VD])

    fig, (ax1) = plt.subplots(nrows=1, figsize=(8, 4))
    ax1.plot(x_durante, ventanuco, 'b', linewidth=1, label=Vtemp.getNombreVentana())

    xx=[]
    yy=[]
    for i in range(indiini,indifinal+1): 
        xx.append(df[1][i]) 
        if fuzz.interp_membership(x_temp,fpTL,df[2][i])<= fuzz.interp_membership(x_durante,ventanuco,df[1][i]):
            yy.append(fuzz.interp_membership(x_temp,fpTL,df[2][i]))
        else:
            yy.append(fuzz.interp_membership(x_durante,ventanuco,df[1][i]))



    ax1.plot(x_durante,yy, color='tab:green',label = 'Protoforma aplicada')

    for i in range(indiini,indifinal+1): 
        ax1.scatter(x=df[1][i],y=fuzz.interp_membership(x_temp,fpTL,df[2][i]))
        
    ax1.set_title(varL.getNombre()+" "+proto.getTL()+" "+Vtemp.getNombreVentana())
    ax1.legend()
    
    plt.savefig("protoforma"+ str(numpro) + ".jpg")

    #plt.savefig("protoforma.jpg")
   

    cadenucha="protoforma"+ str(numpro) + ".jpg"
    print("<p> Resultado aplicar protoforma bloque " +str(numpro) + " de muestras<p>")
    print("<b>",varL.getNombre()+" "+proto.getTL()+" "+Vtemp.getNombreVentana()," ",round(max(yy),2),"</b>")
    print("<img src='"+cadenucha+"' width='600' height='341'>")
    print("<br></br>")
    
    indiini=indifinal

    indifinal=indifinal+int(tjs/tmuestra)
    numpro=numpro+1
