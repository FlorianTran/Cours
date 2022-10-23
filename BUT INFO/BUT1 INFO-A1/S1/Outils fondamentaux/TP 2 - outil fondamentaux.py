p1  = [4,2,5,3]
p2  = [3,5,4,8,9,6]


def degre(P):
    """
    entrée: liste (un polynome);
    supprime les zéros inutiles;
    sortie: le degré du polynome;
    """
    while P[len(P)-1] == 0 :
        del P[len(P)-1]
    return len(P)-1


def somme(P, Q):
    """
    entrée: 2 listes (polynômes)
    somme de 2 listes de polynômes
    sortie
    """
    if degre(P) >= degre(Q):
        R = P
        for i in range(len(Q)):
            R[i] = R[i] + Q[i]
    else:
        R = Q
        for i in range(len(P)):
            R[i] = R[i] + P[i]

    return R


def produit(P, Q):
    pass


def affiche(P):
    """
    entré: liste (polynôme)
    transforme une liste en chaine de caractères contenant le polynôme comme un mathématicien l'aurais écrit
    sortie: une chaine de caractère 
    """
    t = degre(P)
    poly = ""
    for i in range(t,0,-1):
        if P[i] == 1 and i !=1:
            poly = poly + "x" + str(i) + " + "
        elif P[i] == 1 and i == 1:
            poly = poly + "x" + " + "
        elif P[i] > 1 and i == 1:
            poly = poly + str(P[i]) + "x" + " + "
        elif P[i] > 0:
            poly = poly + str(P[i]) + "x" + str(i) + " + "
    poly = poly + str(P[0])
    return poly

print(affiche(p1))

def eval(P, x):
    pass