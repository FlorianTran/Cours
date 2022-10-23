from math import * 

liste = [5,8,9,47,3,1,25,5,4,6,1,5,4,8,78,6]


def mean(L):
    return sum(L)/len(L)

def variance(L):
    var = 0
    for i in L:
        var += (i-mean(L))**2
    return var/len(L)

def ecart_type(L):
    return sqrt(variance(L))

def median(L):
    L.sort()
    if len(L)%2 == 0:
        return int(len(L)/2)+int((len(L)/2)-1)/2
    if len(L)%2 != 0:
        return L[int((len(L)-1)/2)]
         
def first_quartile(L):
    

print(median(liste))
print(ecart_type(liste))

