import numpy as np
import time as time

""" 
<============== Exercice 2 ==============>

np.zeros(7)
## matrice de 1/7 de 0
np.ones(6)
## matrice de 1/6
np.identity(3)
## matrice identité de 3/3
np.random.rand(3,4)
## matrice de 3/4 avec des nombre aléatoires
## np.random.rand(-4,3,size=(3,5),dtype=int)   ##! ne marche pas

a = np.array([[1,3],[0,4]])
b = np.array([[4,0],[-1,1]])
a+b
a+4
a*b
3*a
a*3
np.add(a,b)
a.dot(b)
a @ b
np.linalg.matrix_power(a,2)
np.linalg.inv(a)
a.shape
a.sum()
a.sum(axis=0)
a.sum(axis=1)
a.min()
a.max()
a[1]
a[0,1]
a[0][1]
 """

## Exercice 3.3 Pivot de Gauss

n = 3
A = np.random.randint(-10,10, size=(n,n))
b = np.random.randint(-10,10, size=(n,1))  


def recherche_pivot(A,b,i):
    piv = abs(A[i][i])
    index = 0 
    for j in range(i,len(A[i]),1):
        if abs(A[j][i]) > piv :
                piv = abs(A[j][i])
                index = j
    if piv == 0 :
        return "pas possible"

    tmp = [x for x in A[index]]
    A[index] = A[i]
    A[i] = tmp

    tmp = [x for x in b[index]]
    b[index] = b[i]
    b[i] = tmp

    return A,b


def elimination_bas(A, b, j):
    for i in range (j,len(A)-1,1):
        if A[j+1][i] == A[j][i]:
            for x in range(0,len(A),1):
                A[j+1][i+x] - A[j][i+x]
                
