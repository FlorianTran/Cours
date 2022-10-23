#-------------------------------------------------------------------------------Import------------------------------------------------------------------------------#

import matplotlib.pyplot as plt
import numpy as np
import pandas as pd
import random as rd
from random import randrange

#---------------------------------------------------------------------- Tous les datas -----------------------------------------------------------------------#
data0 = pd.read_csv("donnees_test/data0.csv", sep=",")
data1 = pd.read_csv("donnees_test/data1.csv", sep=",")
data2 = pd.read_csv("donnees_test/data2.csv", sep=",")
data3 = pd.read_csv("donnees_test/data3.csv", sep=",")
data4 = pd.read_csv("donnees_test/data4.csv", sep=",")


#-----------------------------------------------------------------------------Fonctions-----------------------------------------------------------------------------#



def dist(p1, p2):
    return (p1[0] - p2[0])**2 + (p1[1] - p2[1])**2


def PointMoyen(listOfClasses):
    listX=[]
    listY=[]
    for a in listOfClasses:
        listX.append(a[0])
        listY.append(a[1])
    return [np.mean(listX),np.mean(listY)]


#Permet de créer une matrice plus simple à utiliser que les datas normauxs
def matrix(data):
    matrice = []
    lstX, lstY = data["0"].tolist(), data["1"].tolist()
    for i in range(len(lstX)):
        xy = [lstX[i],lstY[i]]
        matrice.append(xy)
    return matrice

def MethodeA(data, ListPtsInit, NbMaxIter):
    """ data : une matrice `a m lignes et n colonnes `a chaque ligne
    correspond `a un point de Rn
    ListPtsInit : une liste de points pour initialiser l'algorithme
    NbMaxIter : un entier fixant le nombre maximal
    d'it´eration de la boucle principale
    ListOfClasses : une liste de classes (listes de points)
    ListOfCentroids : la liste des points moyens de chaque classe """

    ListOfCentroids = [[] for i in range(len(ListPtsInit))]

    # Boucle principale
    for i in range(1, NbMaxIter):
        ListOfClasses = [[] for i in range(len(ListPtsInit))]
        for p in data:
            liste = []
            for j in range(0, len(ListPtsInit)):
                    liste.append(dist(p, ListPtsInit[j]))
                    if len(liste)==len(ListPtsInit):
                        pv = liste[0]
                        ind = 0
                        for i in range(1,len(liste)):
                            if pv > liste[i] : 
                                pv = liste[i]
                                ind = i
                        if p not in ListOfClasses[ind]:
                            ListOfClasses[ind].append(p)
        for k in range(0, len(ListPtsInit)):
            if len(ListOfClasses[k]) != 0:
                ListOfCentroids[k] = PointMoyen(ListOfClasses[k])
            else:
                val = randrange(len(data))
                ListPtsInit[k] = data[val]
                ListOfCentroids[k] = data[val]

    return ListOfClasses, ListOfCentroids


def MethodAExample(Title, ListOfClasses):
    # Titre : chaîne de caractères
    # sauvegarde une illustration graphique de la MethodA dans
    # un fichier Title.pdf
    color = ["blue","green","yellow","red","pink","orange"]
    for i in range(len(ListOfClasses)):
        x1=[]
        y1=[]
        for j in range(len(ListOfClasses[i])):
            x1.append(ListOfClasses[i][j][0])
            y1.append(ListOfClasses[i][j][1])
            plt.scatter(x1,y1,color=color[i])
    
    plt.show()
    plt.savefig(Title+'.pdf', bbox_inches="tight")


def Inertie(data) :
    dis = 0
    for i in range(len(data)):
        for j in data[i]:
            dis += dist(PointMoyen(data[i]),j)
    return dis

def MethodeAElbow(data , NbClassMax, title):
    Lpt = []
    L2 = []
    
    for i in range(1,NbClassMax):
        l = [ data[k] for k in range(i)]
        s,m = MethodeA(data,l,20)
        for k in range(i):
            somme = 0
            for p in range(len(s[k])):
                somme += dist(s[k][p],m[k])
        Lpt.append(i)
        L2.append(somme)
    plt.plot(Lpt,L2,c='blue')
    plt.savefig(title+".pdf", bbox_inches="tight")

def maximum(liste): 
    pv = liste[0]
    ind = 0
    for i in range(1,len(liste)):
        if pv < liste[i] :
            pv = liste[i]  
            ind = i
    return ind        

def initMethodeA(liste, T):
    Mfixe = PointMoyen(liste)
    L=[]
    while len(liste)>T:
        distance = []
        for i in liste :
            distance.append(dist(i,Mfixe))
        Mtemp=liste(maximum(distance))
        while len(Stemp)<= len(S) : 
            Stemp=[]
            for p in liste :
                if dist(p,Mtemp)<= dist(p,Mfixe):
                    Stemp.append(p)
            Mtemp=PointMoyen(Stemp)
            if len(Stemp)>T:
                L.append(Mtemp)


def MethodeAIntel(data, NbMaxIter):
    # data : une matrice `a m lignes et n colonnes `a chaque ligne
    # correspond `a un point de Rn
    # NbMaxIter : un entier fixant le nombre maximal d'it ́eration
    # de la boucle principale
    # ListOfClasses : une liste de classes (listes de points)
    # ListOfCentroids : la liste des points moyens de chaque classe
    ListOfClasses = []
    ListOfCentroids = []
    val = data[0]

    mfixe = PointMoyen(data)
    i = 0 
    
    while i < NbMaxIter:
        mtemp = val
        for test in data:
            if dist(mfixe,mtemp) < dist(mfixe,test):
                mtemp = test
        stemp = []
        for p in data:
            if dist(p,mfixe) > dist(p,mtemp):
                stemp.append(p)
        mtemp = PointMoyen(stemp)
        ListOfClasses.append(stemp)
        ListOfCentroids.append(mtemp)

        j = 0 
        while j < len(data):
            if data[j] in stemp:
                data.pop(j)
            else:
                j += 1
        i+= 1
    
    ListOfClasses.append(data)
    ListOfCentroids.append(mfixe)
    return ListOfClasses, ListOfCentroids

def MethodeAIntelExample(Title,data):
    # Title : chaîne de caract`eres
    # Sauvegarde une illustration graphique de MethodAIntel dans
    # un fichier Title.pdf
    l1, l2 = MethodeAIntel(data,5)

    color = ['pink','blue','orange','green','brown','grey','black']
    for i in range(len(l1)):
        for p in l1[i]:
            plt.scatter(float(p[0]),float(p[1]),c=color[i])
        plt.scatter(l2[i][0],l2[i][1], c="yellow")
    plt.savefig(Title+'.pdf')


#-------------------------------------------------------------------------Méthode B ---------------------------------------------------------------------------------
def Voisinage(S,Pt,epsilon):
    res = []
    for i in S : 
        if i != Pt :
            if dist(Pt,i)<epsilon : 
                res.append(i)
    return res

def ExtensionClasse(S,Pt,PtsVois,C,epsilon,Nmin):
    Pt[-1]=C
    for p in PtsVois:
        PtsVoisPrime = []
        if p[-2]==False:
            p[-2]=True
            PtsVoisPrime=Voisinage(S,p,epsilon)
            if len(PtsVoisPrime)>=Nmin:
                for pt in PtsVoisPrime:
                    if pt not in PtsVois:
                        PtsVois.append(pt)
        if p[-1]==0 :
            p[-1]=C


def MethodB(data, epsilon, Nmin):
    # data : une matrice `a m lignes et n colonnes
    # epsilon : un flottant
    # Nmin : un entier positif
    # ListOfMarkedPts : la liste des points marqu ́es avec leur
    # num ́ero de classe. Un  ́el ́ement de ListOfMarkerPts est
    # [p1,...,pn,True,C] avec [p1,...pn] est un element de data
    # et C correspond `a son num ́ero de classe
    for i in data : 
        i.append(False)
        i.append(0)
    
    cpt = 0
    
    for P in data : 
        Sbruit = []
        if P[-2]==False : 
            P[-2]==True
            PtsVois = Voisinage(data,P,epsilon)
            if len(PtsVois)<Nmin :
                P[3]=-1
                Sbruit.append(P)
            else :
                cpt+=1
                ExtensionClasse(data,P,PtsVois,cpt,epsilon,Nmin)

    NombreClasse = []
    for i in data : 
        if i[3] not in NombreClasse :
            NombreClasse.append(i[3])

    ListOfMarkedPts= [[] for i in range(len(NombreClasse))]

    for i in data:
        if i[3]==-1 : 
            ListOfMarkedPts[len(ListOfMarkedPts)-1].append(i)
        else :    
            ListOfMarkedPts[i[3]-1].append(i)
    return ListOfMarkedPts




def MethodBExample(Title, res):
    # Title : cha^ıne de caract`eres
    # res : resultat de méthodB
    # Sauvegarde une illustration graphique de MethodB dans un
    # fichier Title.pdf
    color = ["blue","green","yellow","red","pink","orange"]
    for i in range(len(res)):
        x1=[]
        y1=[]
        for j in range(len(res[i])):
            x1.append(res[i][j][0])
            y1.append(res[i][j][1])
            plt.scatter(x1,y1,color=color[i])
    plt.savefig(Title+'.pdf')

#Il faut penser à changer les valeurs de l1,l2 et res selon les data

def CompareMethods(title):
    # Title : cha^ıne de caract`eres
    # sauvegarde des graphiques illustrant les diff ́erences de r ́esultat
    # des m ́ethodes A et B dans un fichier Title.pdf
    fig,(ax1,ax2) = plt.subplots(1,2)

    l1,l2 = MethodeAIntel(matrix2(data_concert2),3) #Il faut utiliser la fonction matrix pour les 5 premiers datas
    
    res = MethodB(matrix2(data_concert2), 0.05, 5) #Il faut utiliser la fonction matrix pour les 5 premiers datas

    color = ['pink','blue','orange','green','brown','grey','black']

    for i in range(len(l1)):
        for p in l1[i]:
            ax1.scatter(p[0],p[1],c=color[i])
    
    for i in range(len(res)):
        x1=[]
        y1=[]
        for j in range(len(res[i])):
            x1.append(res[i][j][0])
            y1.append(res[i][j][1])
            ax2.scatter(x1,y1,color=color[i])
    
    ax1.title.set_text("Avec MethodeAIntel")
    ax2.title.set_text("Avec MetodeB")
    plt.savefig(title+'.pdf', bbox_inches="tight")

#--------------------------------------------------------------------PARTIE 3 -------------------------------------------------------------------------------------
#Les données récoltées ici sont tous les endroits de tous les concerts passées en Pays de La Loire.
#Cependant, nous n'arrivions pas à importer la librairie geopanda, ni contextily, donc il était impossible d'importer une image des pays de la loire en fond
#nous avons quand même réaliser le partitionnement des données
#avec la méthode elbow, nous avons trouvé qu'il fallait 3 groupes de points tandis que la méthode B en trouvait 5.
#Celon les résulats, la méthode B était la plus sensée. 


data_concert = pd.read_csv("donnees_test/concert.csv", sep=";")

data_concert2 = data_concert[["Latitude","Longitude"]]

def matrix2(data):
    matrice = []
    lstX, lstY = data["Latitude"].tolist(), data["Longitude"].tolist()
    for i in range(len(lstX)):
        xy = [lstX[i],lstY[i]]
        matrice.append(xy)
    return matrice

#MethodeAElbow(matrix2(data_concert2),10,"Concert_coude")


#----------------------------------------------------------------------------Main(Test)-----------------------------------------------------------------------------#

#print(MethodeAElbow(matrix(data0), 4, "essai"))

""" inert = MethodeAElbow(matrix(data0),10,"essai")

plt.plot([i for i in range(9)],inert)
plt.show() """


""" def randpoint(lis,K):
    res = []
    for i in range(K):
        res.append(rd.choice(lis))
    return res

listPts0 = randpoint(matrix(data0),4)
a,b = MethodeA(matrix(data0),listPts0,100)
MethodAExample("essai",a) """

#MethodeAElbow(matrix(data1),6,"coude")
#MethodeAIntelExample("intel",matrix(data0))
#MethodBExample("essai",MethodB(matrix(data1),0.3,5))
#MethodBExample("essai",MethodB(matrix(data4),0.05,5))
#MethodBExample("essai",MethodB(matrix(data2),0.6,5))
#CompareMethods("compare")
