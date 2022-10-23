import numpy as np
import matplotlib.pyplot as plt
import sympy as sp

""" fig, ax = plt.subplots()
ax.spines["right"].set_color("none") # pas de trait a droite
ax.spines["top"].set_color("none") # pas de trait en haut
ax.spines["bottom"].set_position(("data",0)) # position de l’axe en x=0
ax.spines["left"].set_position(("data",0)) # position de l’axe en y=0
xx = np.linspace(-0.75, 1., 100)
ax.plot(xx, xx**3) 
plt.show()
"""

x = sp.symbols("x")

expr_f = sp.cos(x)
expr_g = sp.exp(x) +x**2 +x**0

print(expr_f)
print(expr_g)
print(expr_f + expr_g)

print(expr_f.subs(x,np.pi))
print(expr_g.subs(x,0))

expr_df = sp.diff(expr_f, x)
print(expr_df)
expr_dg = sp.diff(expr_g, x)
print(expr_dg)
expr_ddg = sp.diff(expr_g, x,2)
print(expr_dg)
expr_dddg = sp.diff(expr_g, x,3)
print(expr_dg)
