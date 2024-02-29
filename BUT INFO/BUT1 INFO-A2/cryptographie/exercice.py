import copy
import math
import time
import numpy as np
import pandas as pd
import matplotlib.pyplot as plt
import random as rd
import hashlib as hash

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
    chifmess = chiffr_affine(mess, rd.randrange(31), rd.randrange(31))
    for i in range(1, 31):
        for y in range(1, 31):
            de = dechiff_affine(chifmess, i, y)
            print(de, i, y)
            if de == mess:
                return "DECRYPT : "+de+" A="+str(i)+" B="+str(y)
    return


print(cass_chiff_affine("bonjour"))

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
            if g**k % p == x:
                return k
    else:
        return "p not > x"

# print(logDiscret(7,6))


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

def difftemp(p, x):
    t1 = time.time()
    Shanks(p, x)
    t2 = time.time()
    t3 = t2-t1
    print("Tmps shanks: ", t3)

    t1 = time.time()
    logDiscret(p, x)
    t2 = time.time()
    t3 = t2-t1
    print("Tmps logDiscret: ", t3)

# difftemp(7,6)


# -----------------------Exercice 5-----------------------#

def alice_key_creation():
    lst_premiers = premiers(2000)
    p = 0
    while p < 1000:
        p = rd.choice(lst_premiers)
    g = generator(p)
    a = rd.randint(2, p-2)
    A = g**a
    return p, g, A, a


def bob_key_creation(p, g):
    lst_premiers = premiers(p-2)
    b = 0
    while b < 2:
        b = rd.choice(lst_premiers)
    B = g**b
    return B, b


def cut_message_in_packs(mess, size):
    m = mess
    paquets = []
    while m > 0:
        paquets.append(m % size)
        m = m//1000
    return paquets


def crypt_packs(packs, A, b, p):
    paquets = packs
    crypted_packs = []
    for i in paquets:
        crypted_packs.append(i*(A**(b) % p))
    return crypted_packs


def decrypt_packs(crypted_packs, B, a, p):
    decrypted_packs = []
    _, u, _ = Euclide_etendu(B**a, p)
    inv = u % p
    for i in crypted_packs:
        decrypted_packs.append(i*inv % p)
    return decrypted_packs


message = "Cristiano Ronaldo, SUIIIIIIIIIIIIIIIIIIIIIIIIII"

print("\n\nMESSAGE NON CRYPTE :", message, " ||")
print("\n\n/////////////--CLE PUBLIQUE D'ALICE--//////////////")
p, g, A, a = alice_key_creation()
print("p --> ", p)
print("g -> ", g)
print("A -> ", A)
print("a -> ", a)
B, b = bob_key_creation(p, g)
print("\n\n/////////////--CLE PUBLIQUE DE BOB--//////////////")
print("b --> ", b)
print("B -> ", B)
message_utf8 = message.encode()
message_hash = hash.sha256(message_utf8).hexdigest()
number_message_hash = int(message_hash, 16)
print("\n\n/////////////--PROCESSUS DE CRYPTAGE--//////////////")
pack_non_crypté = cut_message_in_packs(number_message_hash, 1000)
print("\nmessage en paquets --> ", pack_non_crypté)
pack_crypté = crypt_packs(pack_non_crypté, A, b, p)
print("\nmessage en paquets cryptés --> ", pack_crypté)
pack_décrypté = decrypt_packs(pack_crypté, B, a, p)
print("\n\n/////////////--PROCESSUS DE DECRYPTAGE--//////////////")
print("\nmessage en paquets décryptés par Alice --> ", pack_décrypté)


# -----------------------Exercice 6-----------------------#


def deg(A):
    return len(A)


def plus(A, B):
    A = copy.deepcopy(A)
    B = copy.deepcopy(B)
    degA = deg(A)
    degB = deg(B)
    A.reverse()
    B.reverse()
    R = list()
    for i in range(max(degA, degB)+1):
        r = 0
        if i <= degA:
            r += A[i]
        if i <= degB:
            r += B[i]
        R.append(r % 2)
    R.reverse()
    for i in range(len(R)):
        ok = False
        if R[i] != 0:
            ok = True
        if not ok:
            return [0]
    return R


def create(n):
    return [rd.randint(0, 1) for i in range(n)]


# a = create(5)
# print(a)
# b = create(5)
# print(b)

# print(plus(a, b))


def div_euclid_pol(A, B):
    if deg(A) < deg(B):
        return [0], A.copy()
    Q = []
    while deg(A) >= deg(B):
        if A[0] == 0:
            # dans tous les cas où la liste débute par des 0, je décale à droite
            A = A[1:]
        else:
            if Q == []:
                Q = [1] + [0] * (deg(A)-deg(B))
                A = plus(A, B+[0]*(deg(A)-deg(B)))[1:]
            else:
                Q[deg(B)-deg(A)-1] = 1
                A = plus(A, B*[0]*(deg(A), deg(B)))[1:]
    R = list()
    while len(A) > 1 and A[0] == 0:
        A.pop(0)
    return Q, A[-deg(B):].copy()
