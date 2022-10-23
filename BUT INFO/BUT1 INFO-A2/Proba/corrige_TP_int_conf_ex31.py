import pandas as pd
import numpy as np
import math as mt
import matplotlib.pyplot as plt
from scipy.stats import *

data_file = pd.ExcelFile('video_etu.xlsx')
data_films = pd.read_excel(data_file, 'films')
duree_films=data_films['FILM_DUREE']
moyenne_pop_duree=duree_films.mean()
print("moyenne_pop_duree=\n",moyenne_pop_duree)
nombre_films=duree_films.count()
print("nombre_films=",nombre_films)
ecart_type_pop=duree_films.std()
nb_ech=1000
taille_ech=50
res_moy=np.zeros(nb_ech)
res_ecart_type=np.zeros(nb_ech)
res_interv=[]
Fiab=0.95
quantile=norm.ppf(1-(1-Fiab)/2)
print('quantile=\n',quantile)
for i in range(nb_ech):
    ech=np.random.choice(duree_films, size=taille_ech, replace=False)
    res_moy[i]=ech.mean()
    res_ecart_type[i]=ech.std()
    res_interv.append((res_moy[i]-quantile*res_ecart_type[i]/mt.sqrt(taille_ech),res_moy[i]+quantile*res_ecart_type[i]/mt.sqrt(taille_ech)))

nb_bons_interv=len([i for i in range(nb_ech) if (moyenne_pop_duree>res_interv[i][0] and moyenne_pop_duree<res_interv[i][1])])
print('nb_bons_interv=\n',nb_bons_interv)
fig,ax=plt.subplots(1,1)

'''Pour représenter la fonction de densité de la loi normale :
listx_nor=np.linspace(norm.ppf(0.001),norm.ppf(0.999),100)*ecart_type_pop/mt.sqrt(taille_ech)+moyenne_pop_duree
listy_nor=norm.pdf(np.linspace(norm.ppf(0.005),norm.ppf(0.995),100))/(ecart_type_pop/mt.sqrt(taille_ech))
ax.plot(listx_nor,listy_nor,'r-',lw=3,label='densité loi normale $\mathcal{N}(m_{pop},\dfrac{\sigma_{pop}}{\sqrt{taille_{ech}}})$')
'''

n, bins, patches = plt.hist(res_moy, 10, density=True, facecolor='g',label='Répartition moyennes des échantillons', alpha=0.75)
plt.legend()
plt.show()








