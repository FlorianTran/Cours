import math
import time
import numpy as np
import pandas as pd
import matplotlib.pyplot as plt
import random as rd

# -----------------------Exercice 1.1-----------------------#


def premier(n):
    if n < 2:
        return False
    for i in range(round(math.sqrt(n)), 1, -1):
        if n % i == 0:
            return False
    return True

# -----------------------Exercice 1.2-----------------------#


def premiers(n):
    tab = []
    for i in range(1, n):
        if premier(i):
            tab.append(i)
    return tab


# print(premiers(15))
# print(1/(math.log(15)-1))

# -----------------------Exercice 1.3-----------------------#

def Euclide_etendu(a, b):
    if a < b:
        return
    u0 = 1
    u1 = 0
    v0 = 0
    v1 = 1
    while a % b != 0:
        r = a % b
        q = a//b
        a = b
        b = r
        u2 = u0-q*u1
        v2 = v0-q*v1
        u0 = u1
        v0 = v1
        u1 = u2
        v1 = v2
    return b, u1, v1


#print(Euclide_etendu(120, 23))

# -----------------------Exercice 1.4-----------------------#
# a.
def tmps_premiers(tab):
    tmps = list()
    for i in tab:
        tmp1 = time.time()
        premier(i)
        tmp2 = time.time()
        tmps.append(tmp2-tmp1)
    return tmps


list_nb_a_tester = [13, 1009, 10007, 100003, 1000003, 10000019, 100000007,
                    1000000007, 10000000019, 100000000003, 1000000000039, 100000000000031]

# print(tmps_premiers(list_nb_a_tester))

list_test = [13, 1009, 10007, 100003, 1000003, 10000019, 100000007]
# b.


def nuage_points():
    x = [len(str(i)) for i in list_test]
    y = tmps_premiers(list_test)
    print(y)
    plt.scatter(x, y)
    plt.plot(x, [math.log10(u) for u in tmps_premiers(list_test)])
    plt.show()

# nuage_points()

# -----------------------Exercice 3.1-----------------------#


dict_cod = {'a': 1, 'b': 2, 'c': 3, 'd': 4, 'e': 5, 'f': 6, 'g': 7, 'h': 8, 'i': 9, 'j': 10, 'k': 11, 'l': 12, 'm': 13, 'n': 14, 'o': 15, 'p': 16, 'q': 17,
            'r': 18, 's': 19, 't': 20, 'u': 21, 'v': 22, 'w': 23, 'x': 24, 'y': 25, 'z': 26, ' ': 27, ',': 28, '.': 29, '?': 30, ':': 0}

keys = list(dict_cod.keys())
values = list(dict_cod.values())
newDict = {}

for i in range(len(keys)):
    newDict[values[i]] = keys[i]

# -----------------------Exercice 3.2-----------------------#


def chiffr_affine(mess, a, b):
    chiff_mess = ""
    for i in mess:
        chiff_mess += newDict[(a*dict_cod[i]+b) % 31]
    return chiff_mess

# -----------------------Exercice 3.3-----------------------#


def dechiff_affine(mess, a, b):
    decrypt_mess = ""
    _, _, u = Euclide_etendu(31, a)
    for i in mess:
        decrypt_mess += newDict[(u*(dict_cod[i]-b)) % 31]
    return decrypt_mess


#ch = chiffr_affine("bonjour", 15, 13)
# print(ch)
#print(dechiff_affine(ch, 15, 13))

# -----------------------Exercice 3.4-----------------------#


def cass_chiff_affine(mess):
    a = rd.randrange(1, 31)
    b = rd.randrange(1, 31)
    chiff_msg = chiffr_affine(mess, a, b)
    nb = 0
    for i in range(1, 31):
        for j in range(1, 31):
            rand_msg = chiffr_affine(mess, i, j)
            if chiff_msg == rand_msg:
                print("OG mess: " + mess + "; crypted mess: " + chiff_msg, a, b)
                return nb, "Mess: " + chiff_msg + "[" + str(i)+";"+str(j) + "]"
            print(nb, rand_msg)
            nb += 1


# print(cass_chiff_affine("bonjour"))

# -----------------------Exercice 4.1-----------------------#

def generator(p):
    if not premier(p):
        return p, " not prime"
    ZpZ = [i for i in range(p)]
    for i in range(1, p-1):
        list = []
        for k in range(1, len(ZpZ)):
            list.append(i**k % p)
        complist = [value for value in ZpZ if value in list]
        if len(complist) == p-1:
            return i

    return

# print(generator(7))


def logDiscret(p, x):
    if p > x:
        g = generator(p)
        for k in range(p-1):
            if g**k % 7 == x:
                return k
    else:
        return "p not > x"

#print(logDiscret(7,6))


def Shanks(p, x):
    g = generator(p)
    s = 1 + int(math.sqrt(p))
    _, _, v = Euclide_etendu(p, g)
    babyStep = []
    giantStep = []
    for i in range(s):
        babyStep.append(g**i)
        giantStep.append(x*(v % p)**(i*s) % p)
    for i in range(s):
        for j in range(s):
            if (babyStep[i] == giantStep[j]):
                return i + j * s


#print(Shanks(7, 6))

def difftemp(p,x):
    t1 = time.time()
    Shanks(p,x)
    t2 = time.time()
    t3 = t2-t1
    print("Tmps shanks: ", t3)
    
    t1 = time.time()
    logDiscret(p,x)
    t2 = time.time()
    t3 = t2-t1
    print("Tmps logDiscret: ", t3)

#difftemp(7,6)


# -----------------------Exercice 5-----------------------#

def key_creation():
    prime = premiers(2000)
    p = prime[rd.randrange(len(prime))]
    while p < 1000:
        p = prime[rd.randrange(len(prime))]
    g = generator(p)
    a = rd.randrange(2,p-2)
    A = g**a
    return p,g,A,a

print(key_creation())


def public_creation(p,g,A,a):
    b = rd.randrange(2,p-2)
    B = g**b
    return p,g,B