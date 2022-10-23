###---------------------------IMPORT---------------------------####
import matplotlib.pyplot as plt
import numpy as np
import math as m
###------------------------EXERCICE 17------------------------####
#--17.1--#
def X(k):
    return 0.1*(3-k)**2

def diagramme_bat():
    ax = plt.subplots()
    ax.bar([i for i in range(6)],[X(k) for k in range(6)])
    plt.show()


#--17.2--#
#* L'univers image de X est de {0,0.1,0.4}

#--17.3--#
table_valeur = [0.4,0.5,0.5,0.6,1]

#--17.4--#

def diagramme_repartition():
    ax = plt.subplot()
    for i in range(len(table_valeur)):
        ax.plot([i,i+1],[table_valeur[i],table_valeur[i]])
    plt.show()

# diagramme_repartition()

#--17.5--#
# Espérance
def E(X):
    res = 0
    for k in range(len(X)):
        res+= X[k]*k+1
    return res


# Variance
def Var(X):
    moy = np.mean(X)
    sum = 0
    for i in X:
        sum += (i-moy)**2
    return sum/len(X)

def Ecart_type(X):
    return m.sqrt(Var(X))

test = [X(k) for k in range(1,6)]

print(E(test))

print(Var(test))

print(Ecart_type(test))