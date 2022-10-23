import pandas as pd
import matplotlib.pyplot as plt

data = pd.read_csv('pyramide_ages.csv', sep=',')


"""
data.columns
    Cette méthode renvoie un tableau avec tous les premières valeurs des colonnes
data['age']
    Renvoie les valeurs de la colonne age
ata[data['age']<60]
    Renvoie les 60 premières valeurs de la colonne age
"""

fig, axes = plt.subplots(1, 1)
axes.barh(y=data['age'], width=data['2019_F'], label='Femme')
axes.barh(y=data['age'], width=-data['2019_H'], label='Homme')
axes.legend()
plt.show()


fig, (axes1, axes2, axes3) = plt.subplots(1, 3)
fig.suptitle('Pyramides des âges en France')

axes1.barh(y=data['age'], width=data['1975_F'], label='Femme')
axes1.barh(y=data['age'], width=-data['1975_H'], label='Homme')
dif1 = data['1975_F']-data['1975_H']
line1 = axes1.plot(dif1, range(len(dif1)), color='green', label='Différence')

axes2.barh(y=data['age'], width=data['1999_F'])
axes2.barh(y=data['age'], width=-data['1999_H'])
dif2 = data['1999_F']-data['1999_H']
line2 = axes2.plot(dif2, range(len(dif2)), color='green')

axes3.barh(y=data['age'], width=data['2019_F'])
axes3.barh(y=data['age'], width=-data['2019_H'])
dif3 = data['2019_F']-data['2019_H']
line3 = axes3.plot(dif3, range(len(dif3)), color='green')

fig.legend(loc="lower center", ncol=3)
fig.set_size_inches(13.5, 5)

plt.show()
