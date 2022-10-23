import math

pairs = set([x for x in range(0, 10)])

impairs = set([x for x in range(1, 21, 2)])

vide = set()

liste = [48, 4, 48, 148, 65, 36]

ensembleA = {1, 8, 3, 4, 6}

ensembleB = {1, 6, 3, 4, 5, 10}

ensemble0a10 = set([x for x in range(0, 11)])


def affiche_col(ens):
    for e in ens:
        print(e)


def membre(x, ens):
    for e in ens:
        if e == x:
            return True
    return False


def somme(ens):
    e = 0
    for i in ens:
        e = e + i
    return e


def taille(ens):
    return len(ens)


def moyenne(ens):
    e = somme(ens) / len(ens)
    return e


def est_ensemble(liste):
    cpt = 0
    lon = len(liste)
    while cpt < (lon - 1):
        for e in liste[cpt + 1:]:
            if liste[cpt] == e:
                return False
        cpt = cpt + 1
    return True


def est_ensemble2(liste):
    indice = 0
    for courant in liste:
        for elem in liste[indice + 1:]:
            if courant == elem:
                return False
        indice += 1
    return True


def suppr_doublon(liste):
    result = set()
    for elem in liste:
        if not (membre(elem, result)):
            result.add(elem)
    return result


# ------------------------------------------------------------------------------------------------------------------------------------------------------------
# ex 6
# ------------------------------------------------------------------------------------------------------------------------------------------------------------

def inclus(A, B):
    for a in A:
        if a not in B:
            return False
    return True


def egal(A, B):
    return inclus(A, B) and inclus(B, A)


def disjoint(A, B):
    for a in A:
        if a not in B:
            return True
    return False


def ajoute(x, ens):
    E = set()
    E.add(x)
    for a in ens:
        E.add(a)
    return E


def union(A, B):
    E = set()
    for a in A:
        E.add(a)
    for b in B:
        E.add(b)
    return E


def intersection(A, B):
    E = set()
    for a in A:
        for b in B:
            if a == b:
                E.add(a)
                break
    return E


def retire(x, ens):
    E = set()
    for a in ens:
        E.add(a)
    E.remove(x)
    return E


def diff(A, B):
    E = set()
    for a in A:
        E.add(a)
    for a in A:
        for b in B:
            if a == b:
                E.remove(a)
    return E


def diff_sys(A, B):
    E = set()
    E = diff(union(A, B), intersection(A, B))
    return E


def iter_parties(e, ps):
    res = set()
    for p in ps:
        res.add(p)
        res.add(frozenset(ajoute(e, p)))
    return res


def parties(es):
    parties = {frozenset()}
    for e in es:
        parties = iter_parties(e, parties)
        print(parties)
    return parties


# ------------------------------------------------------------------------------------------------------------------------------------------------------------
# ex 7
# ------------------------------------------------------------------------------------------------------------------------------------------------------------

def qotrem(a, b):
    assert (a >= 0) and (b > 0)
    rem = a
    qot = 0
    while rem >= b:
        rem = rem - b
        qot = qot + 1
    return qot, rem


def qotrem_aux(b, q, r):
    if r < b:
        return q, r
    else:
        return qotrem_aux(b, q + 1, r - b)


## func pgcd -> trouve le plus grand diviseur commmun

def pgcdRecu(a, b):
    if b == 0:
        return a
    else:
        return pgcd(b, qotrem(a, b)[1])


def pgcd(a, b):
    r = qotrem(a, b)[1]
    while r > 0:
        tmp = r
        r = qotrem(b, r)[1]
        b = tmp
    return b


def algoEuclide(a, b):
    assert (a > 0) and (b > 0)
    u0, u1, v0, v1 = 1, 0, 0, 1
    q = a // b
    r = a % b
    if r == 0:
        return b, u1, v1
    while r != 0:
        a = b
        b = r
        u2 = u0 - u1 * q
        v2 = v0 - v1 * q
        u0 = u1
        v0 = v1
        u1 = u2
        v1 = v2
        q = a // b
        r = a % b
    return b, u1, v1


# ------------------------------------------------------------------------------------------------------------------------------------------------------------
# ex 9
# ------------------------------------------------------------------------------------------------------------------------------------------------------------

def convert(n, b):
    assert (b <= 10) and (b > 0)
    result = 0
    x = 0
    # <----------------- trouver comment décomposé n
    while nb > 10:
        nb = n // 10
    i = 0
    while i < nb:
        result = x * b ** i
        i = i + 1


def DecimalToBinary(num):
    if num >= 1:
        DecimalToBinary(num // 2)
    print(num % 2, end='')


convert(5, 8)
