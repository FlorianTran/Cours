import matplotlib.pyplot as plt
import numpy as np
import random as rd
import time

## TRAN FLORIAN GRP 4-2

#=======================================================================================================================================#
#---------------------------------------------------- TP3 INTERPOLATION POLYNOMIALE ----------------------------------------------------#
#=======================================================================================================================================#

x = np.linspace(-1, 4, 100)

# listes X  et Y

listX = [0, 1, 2]
listY = [-1, 3, 2]

i = 1

listCoef = []

# 1.a Construction naïve : Fonction Base lagrange


def BaseLagrange(X, listX, i):
    res = 1
    for j in range(len(listX)):
        if i != j:
            res *= (X - listX[j])/(listX[i]-listX[j])
    return res


def DrawBaseLagrange():
    plt.plot(x, BaseLagrange(x, listX, i))
    plt.show()

# 1.b Fonction Interlagrange


def InterLagrange1(X, listX, listY):
    res = 0
    for i in range(len(listX)):
        res += listY[i] * BaseLagrange(X, listX, i)
    return res


def DrawInterLagrange():
    plt.plot(x, InterLagrange1(x, listX, listY))
    plt.show()

# 2. Interlude : l'agorithme de Horner
# 2.a Fonction naïve EvalP


def EvalP(b, listCoef):
    res = 0
    for i in range(len(listCoef)):
        res += listCoef[-1] * (b**i)
    return res

# 2.d Fonction Horner


def Horner(b, listCoef):
    res = listCoef[-1]
    for i in range(len(listCoef)):
        res *= b
        res += listCoef[i]
    return res

# 2.e Fonction qui compare le temps d'execution de Horner et EvalP


def compare(N):
    t0 = time.time()
    for i in range(N):
        EvalP(2, listCoef)
    TmpEvalP = time.time() - t0

    t1 = time.time()
    for i in range(N):
        Horner(2, listCoef)
    TmpHorner = time.time() - t1
    return TmpEvalP - TmpHorner

# 3. Une construction moins naïve : l'agorithme des différentes divisées
# 3.b Foncion DifferenceDivisées


def DifferenceDivises(listX, listY):
    listCoef = []
    for i in range(len(listY)):
        listCoef.append([listY[i]])

    for i in range(1, len(listX)):
        for j in range(i, len(listCoef)):
            listCoef[j].append(
                (listCoef[j][i-1]-listCoef[j-1][i-1])/(listX[j]-listX[j-i]))
    tab = []
    for i in range(len(listCoef)):
        tab.append(listCoef[i][i])
    return tab

# 3.c Foncion InterLagrange2


def InterLagrange2(X, listX, listY):
    res = []
    coef = DifferenceDivises(listX, listY)

    for i in X:
        sum = coef[0]
        for j in range(1, len(coef)):
            prod = coef[j]
            for k in range(j):
                prod *= (i - listX[k])
            sum += prod
        res.append(sum)
    return res


def DrawInterLagrange2():
    plt.plot(x, InterLagrange2(x, listX, listY))
    plt.show()

# 4. Approximation de fonctions
# 4.a.i


def f(x):
    return 1/(1+10*x**2)


def Draw(N):
    i = np.linspace(-5, 5, 100)
    y = [f(x) for x in i]
    plt.plot(i, y)

    absc = np.linspace(-5, 5, N)
    ordo = [f(x) for x in absc]
    plt.plot(absc, InterLagrange2(absc, absc, ordo))

    for i in range(len(absc)):
        plt.scatter(absc[i], ordo[i])
    plt.show()

# plus N grandit plus le polynome inter se rapproche de la courbe f
# 4.a.ii


def Draw2(N):
    i = np.linspace(-5, 5, 100)
    y = [f(x) for x in i]
    plt.plot(i, y)

    absc = np.polynomial.chebyshev.Chebyshev(np.array([0]*N+[1])).roots()
    ordo = [f(x) for x in absc]
    plt.plot(absc, InterLagrange2(absc, absc, ordo))

    for i in range(len(absc)):
        plt.scatter(absc[i], ordo[i])
    plt.show()


Draw(6)
Draw2(6)

# plus N grandit plus le polynome inter se rapproche de la courbe f
