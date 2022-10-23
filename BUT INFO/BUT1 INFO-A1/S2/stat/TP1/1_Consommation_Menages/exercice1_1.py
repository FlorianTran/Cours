import pandas as pd
import matplotlib.pyplot as plt
data = pd.read_csv('consommation_menages.csv', sep=',')


# Exercice 1
"""
type(data)
    On retourne le type de l'objet data, c'est un DataFrame de la librairie pandas.
data.info
    Cette méthode renvoie un résumé concis du DataFrame.
data.Fonction
    Ici cette méthode retourne unique la colonne nommée Fonction, son Name et son dtype.
data.1960
    Cette méthode ne fonction pas.
data['Fonction']
    Cette méthode retourne les mêmes informations que data.Fonction.
data['1960']
    Les valeurs de la colonne 1960 sont retournées.
data[['1960','2020']]
    Les valeurs de la colonne 1960 et 2020 sont retournées.

"""

# 1
df = pd.DataFrame(data, columns=['Fonction', '1960'])
df.plot.bar(x='Fonction', y='1960')
plt.title('Consommation des ménages en 1960')

plt.show()
# 2
df = pd.DataFrame(data, columns=['Fonction', '2020'])
df.plot.bar(x='Fonction', y='2020')
plt.title('Consommation des ménages en 2020')

plt.show()
# 3
df = pd.DataFrame(data, columns=['Fonction', '1960', '2020'])
df.plot.bar(x='Fonction', y=['1960', '2020'])
plt.title('Consommation des ménages')

plt.show()
