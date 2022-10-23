from scipy.stats import linregress
import math as m
import pandas as pd
import matplotlib.pyplot as plt
import numpy as np
import csv

# TP 2 Tom FRERET, Florian TRAN

# Exercice 2.1
# 1)
# a)


def point_moyen(X, Y):
    return np.mean(X), np.mean(Y)
# b)
def coeffs_corr(X, Y):
    meanX = np.mean(X)
    meanY = np.mean(Y)
    meanXY = 0
    for i in range(len(X)):
        meanXY += X[i]*Y[i]
    meanXY /= len(X)
    return meanXY - meanX*meanY
def coeffs_corr_lineaire(X, Y):
    return coeffs_corr(X, Y) / (ecart_type(X)*ecart_type(Y))
# c)
def variance(L):
    moy = np.mean(L)
    sum = 0
    for i in L:
        sum += (i-moy)**2
    return sum/len(L)

def ecart_type(L):
    return m.sqrt(variance(L))

def coeffs_droite_reg(X, Y):
    a = coeffs_corr(X, Y)/ecart_type(X)**2
    b = np.mean(Y)-a*np.mean(X)
    return a, b
# d)

def etude(X, Y):
    data = {"x": X, "y": Y}
    df = pd.DataFrame(data)
    df.plot.scatter(x='x', y='y')

    x_point_moyen, y_point_moyen = point_moyen(data['x'], data['y'])
    plt.plot(x_point_moyen, y_point_moyen, marker="o", color="orange")

    a, b = coeffs_droite_reg(X, Y)
    x = np.linspace(min(X)-np.mean(X)/50, max(X)+np.mean(X)/50, 10)
    y = a*x+b
    coeff = str(coeffs_corr_lineaire(X, Y))
    plt.plot(x, y, color="orange", label="coff. de cor. = "+coeff)

    plt.legend(loc="upper left")
    plt.xlabel("")
    plt.ylabel("")
    plt.show()


PIB = [1121.0, 1132.2, 1149.1, 1138.9, 1162.4, 1181.8,
       1194.9, 1217.6, 1259.1, 1299.5, 1348.8, 1377.1, 1393.7]
Dépense = [627.5, 631.7, 637.5, 633.7, 641.2, 649.0,
           657.3, 658.2, 680.7, 702.6, 721.2, 740.1, 748.9]

etude(PIB, Dépense)


# Exercice 2.1
# 2)


with open("1_Correlation_lineaire\PercenRevParlVSEtude.csv", newline='') as csvfile:
    data = csv.reader(csvfile, delimiter=',')
    Liste = []
    for row in data:
        Liste.append(list(row))

col1 = []
col2 = []

for i in range(len(Liste)):
    if i != 0:
        col1.append(float(Liste[i][0]))
        for j in range(len(Liste[i][1])):
            if Liste[i][1][j] == ",":
                debut = Liste[i][1][:j]
                fin = Liste[i][1][j+1:]
                break
        res = debut + "." + fin
        col2.append(float(res))

etude(col1, col2)


# Exercice 2.1
# 3)

def recupData(filepath):
    with open(filepath, newline='') as csvfile:
        data = csv.reader(csvfile, delimiter=',')
        Liste = []
        for row in data:
            Liste.append(list(row))

    col1 = []
    col2 = []

    for i in range(len(Liste)):
        if i != 0:
            col1.append(float(Liste[i][0]))
            col2.append(float(Liste[i][1]))
    return col1, col2


col1A, col2A = recupData("1_Correlation_lineaire\ExAsetA.csv")
etude(col1A, col2A)

col1B, col2B = recupData("1_Correlation_lineaire\ExAsetB.csv")
etude(col1B, col2B)

col1AB = []
col2AB = []
for i in range(len(col1A)):
    col1AB.append(col1A[i]+col1B[i])
    col2AB.append(col2A[i]+col2B[i])

etude(col1AB, col2AB)


col1A, col2A = recupData("1_Correlation_lineaire\ExBsetA.csv")
etude(col1A, col2A)

col1B, col2B = recupData("1_Correlation_lineaire\ExBsetB.csv")
etude(col1B, col2B)


col1A, col2A = recupData("1_Correlation_lineaire\ExCsetA.csv")

data = {"x": col1A, "y": col2A}
df = pd.DataFrame(data)
df.plot.scatter(x='x', y='y')

x_point_moyen, y_point_moyen = point_moyen(data['x'], data['y'])
plt.plot(x_point_moyen, y_point_moyen, marker="o", color="orange")

a, b = coeffs_droite_reg(col1A, col2A)
x = np.linspace(min(col1A)-np.mean(col1A)/50, max(col1A)+np.mean(col1A)/50, 10)
y = a*x+b

x2 = np.linspace(min(col1A)-np.mean(col1A)/50,
                 max(col1A)+np.mean(col1A)/50, 100)
y2 = np.sqrt(x2)

coeff = str(coeffs_corr_lineaire(col1A, col2A))
plt.plot(x, y, color="orange", label="coff. de cor. = "+coeff)
plt.plot(x2, y2)

plt.legend(loc="upper left")
plt.xlabel("")
plt.ylabel("")
plt.show()

col1B, col2B = recupData("1_Correlation_lineaire\ExCsetB.csv")

data = {"x": col1B, "y": col2B}
df = pd.DataFrame(data)
df.plot.scatter(x='x', y='y')

x_point_moyen, y_point_moyen = point_moyen(data['x'], data['y'])
plt.plot(x_point_moyen, y_point_moyen, marker="o", color="orange")

a, b = coeffs_droite_reg(col1B, col2B)
x = np.linspace(min(col1B)-np.mean(col1B)/50, max(col1B)+np.mean(col1B)/50, 10)
y = a*x+b

x2 = np.linspace(min(col1B)-np.mean(col1B)/50,
                 max(col1B)+np.mean(col1B)/50, 100)
y2 = x2**2

coeff = str(coeffs_corr_lineaire(col1B, col2B))
plt.plot(x, y, color="orange", label="coff. de cor. = "+coeff)
plt.plot(x2, y2)

plt.legend(loc="upper left")
plt.xlabel("")
plt.ylabel("")
plt.show()

# Exercice2.2

# 1)
# a)
x, y = np.loadtxt("2_Donnees_trompeuses/regLinData.dat", unpack=True)
res = linregress(x, y)
plt.plot(x, y, 'o')
plt.plot(x, res.intercept + res.slope*x, 'r')
plt.show()

# b)
a, b = coeffs_droite_reg(x, y)
for i in range(len(y)):
    y[i] -= a*x[i]+b
res = linregress(x, y)
plt.plot(x, y, 'o')
plt.plot(x, res.intercept + res.slope*x, 'r')
plt.show()

# 2)
# a)

x, y = np.loadtxt("2_Donnees_trompeuses/regLinData.dat", unpack=True)
z = np.polyfit(x, y, 2)
plt.plot(x, y, 'o')
plt.plot(x, z[0]*x**2+z[1]*x+z[2], 'r')
plt.show()

# b)

a, b = coeffs_droite_reg(x, y)
for i in range(len(y)):
    y[i] -= a*x[i]+b
z = np.polyfit(x, y, 2)
plt.plot(x, y, 'o')
plt.plot(x, z[0]*x**2+z[1]*x+z[2], 'r')
plt.show()


# Exercice TD2
# 2.3
a = [3, 4, 6, 7, 9, 10, 9, 11, 12, 13, 15, 4]
b = [8, 9, 10, 13, 15, 14, 13, 16, 13, 19, 6, 19]
etude(a, b)

'''On remarque que le coefficient de corrélation se rapproche de zéro, les 2 derniers couples 
de valeurs semblent se distinguer on va donc les enlever '''

a = [3, 4, 6, 7, 9, 10, 9, 11, 12, 13]
b = [8, 9, 10, 13, 15, 14, 13, 16, 13, 19]
etude(a, b)

'''On remarque cette fois que le coéfficient se rapproche maintenant de 1 ce qui montre que les 
variables sont en relation'''

# 2.4
x = [20, 30, 50, 70, 90, 110, 130]
y = [13, 28, 42, 66, 96, 129, 167]
etude(x, y)

y2 = []
z = []
for i in y:
    z.append(np.sqrt(i))
    y2.append(i-np.sqrt(i))
etude(x, y2)
'''On s'éloigne un tout petit peu de 1 quand on substitue la racine carrée Z a Y'''
etude(x, z)
'''On trouve en faisant des estimations avec les graphs que nous avons produit que
pour un une vitesse de 80km il faut 89m pour s'arréter et pour 140km, 172m  '''


# 2.5)
x = [3, 4, 5, 6, 8, 10, 12]
y = [16, 12, 9.6, 7.9, 6, 4.7, 4]
print(coeffs_corr_lineaire(x, y))

'''Oui il le faut pour pouvoir avoir une représentatiion des données plus précises'''
x1 = []
for i in x:
    x1.append(m.log(i))
y1 = []
for i in y:
    y1.append(m.log(i))

print(coeffs_corr_lineaire(x1, y1))
'''On voit que le coefficient dans la 2ème question s'est rapproché de -1'''

a, b = coeffs_droite_reg(x1, y1)
print(a, "x +", b)
