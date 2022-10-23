from cmath import tan
import math
from random import randint
import matplotlib.pyplot as plt
import numpy as np
from scipy.misc import derivative
import sympy as sp

# Exercie 2.1 #

def g(x):
    return x * math.tan(x)-1


def test(x):
    return x**2-2


def dichotomie(f, a, b, e):
    alpha = 1
    while alpha > e:
        m = (a+b)/2
        alpha = abs(a-b)
        if m == 0:
            return m
        elif f(m)*f(a) > 0:
            a = m
        else:
            b = m
    return a, b


# print(math.sqrt(2))
# print(dichotomie(test, 0, 10, 0.000001))
# print(dichotomie(g, 0, 10, 0.000001))

# Exercie 2.3 #

def Newton(f, df, x0, N):
    for i in range(N):
        xN = x0 - f(x0) / df(x0)
        x0 = xN
    return xN

def j(x):
    return x**2-2

def dj(x):
    return 2*x

def f(x):
    return x*math.tan(x)-1

def df(x):
    return math.tan(x)+(x/math.cos(x)**2)

print(Newton(j,dj,1,10))

x = np.linspace(0,1)

def VitesseNewton():
    n = randint(0,10)
    y = []
    for i in x:
        y.append(f(i))
    plt.plot(x,y)
    plt.plot(x,x*Newton(f,df,f(x[0]),n))
    plt.show()
    
    
VitesseNewton()

def Secante(f, x0, x1, N):
     while True:
        x = x1 - ( x1 - x0 ) * f(x1) / ( f(x1) - f(x0) )
        if abs(x - x1) <= 10**(-N):
            return x
        else:
            x0, x1 = x1, x
            
print(Secante(j,0,-2,10))


def VitesseSecante():
    n = randint(0,10)
    y = []
    for i in x:
        y.append(f(i))
    plt.plot(x,y)
    plt.plot(x,x*Secante(f,x[0],f(x[0]),n))
    plt.show()
    
VitesseSecante()