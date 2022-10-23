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
