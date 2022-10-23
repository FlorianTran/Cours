import matplotlib.pyplot as plt
import numpy as np
import random as rd
# TP 1 TRAN FLORIAN GRP 4-2 
# création de nos X et Y pour créer nos fonctions
x = np.linspace(0, 1)
y = x
# la suite de nombre de c utilisé dans la figure 1
C = [0.5, 1.5, 2, 2.5, 3, 3.5, 4]
# a un nombre aléatoire entre 0 et 1
a = rd.random()

# fonction f


def f(x, C):
    return C * x * (1 - x)

# fonction qui retourn les N premiers termes de la suite associé à c et a


def logistique(c, a, N):
    u = [a]
    for i in range(N):
        u.append(c*u[-1]*(1-u[-1]))
    return u

# fonction qui permet d'afficher la représentation en escalier des foncitons par rapport à y = x


def GrapheLogistique(c, a, N):
    u = logistique(c, a, N)
    absisse = [i/1000 for i in range(1000)]
    ordonne = [c*absisse[i]*(1-absisse[i]) for i in range(1000)]
    for i in range(1, len(u)-1):
        plt.plot([u[i], u[i]], [u[i], u[i+1]])
        plt.plot([u[i], u[i+1]], [u[i+1], u[i+1]])
    plt.plot(absisse, ordonne)
    plt.plot(x, y)
    plt.show()

# Boucle pour créer toutes les fonctions différentes de la figure 1


for i in range(len(C)):
    plt.plot(x, f(x, C[i]), label="c = " + str(C[i]))

plt.plot(x, f(x, C[1]))
print(a)
print(logistique(C[1], a, 10))
GrapheLogistique(C[1], a, 10)
GrapheLogistique(2.3, 0.2, 100)
GrapheLogistique(2.95, 0.2, 100)
GrapheLogistique(3.5, 0.2, 100)
GrapheLogistique(3.1, 0.4, 100)

# la suite utilisé pour le diagramme feigenbaum


def u(n, r, u0):
    u = u0
    for i in range(n):
        u = r*u*(1-u)
    return u

# fonction qui dessine le diagramme feigenbaum


def feigenbaum(u0, c1, c2):
    x = []
    y = []
    r = 1
    dr = 0.001
    while r < c2:
        for n in range(c1, c2):
            x.append(float(r))
            y.append(float(u(n, r, u0)))
        r = r+u0
    plt.scatter(x, y, 1)
    plt.show()


feigenbaum(0.6, 150, 200)

# plt.scatter(x, f(x, C[0]))

# plt.legend()
plt.show()


# ALGORITHME NAIF

def createList(u0, n, n2):
    lst = [u0]
    for i in range(n, n2):
        lst.append((163811 * lst[-1] % 655211)-327605)
    return lst


lst1 = createList(42, 1, 1000)
lst2 = createList((163811 * lst1[-1] % 655211)-327605, 1001, 11000)
lst3 = createList((163811 * lst2[-1] % 655211)-327605, 11001, 111000)

lstEx = [2, 6, 8, -5, -3, 8, -20]


def somme(a, i, j):
    sum = 0
    if (i == j):
        return a[i]
    for k in a[i:j]:
        sum += k
    return sum


def coupe_mini1(a):
    res = a[0]
    for i in range(len(a)):
        for j in range(i+1, len(a)+1):
            if (somme(a, i, j) < res):
                res = somme(a, i, j)
    return res


#print(somme(lstEx, 1, 4))
# print(coupe_mini1(lstEx))

# ALGORITHME DE COUPE QUADRATIQUE


def mincoupe(a, i):
    min = a[0]
