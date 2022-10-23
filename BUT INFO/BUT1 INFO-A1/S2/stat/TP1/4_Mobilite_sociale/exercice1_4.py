import pandas as pd
import matplotlib.pyplot as plt
import numpy as np
### TP1 VISUALISER DES DONNEES ###

# MOBILITE SOCIALE

# Profession de l'enfant
category_names = ["Agriculteurs \n exploitants",
                  "Artisans, commerçants \n chefs d'entreprise",
                  "Cadres et professions \n intellectuelles supérieures",
                  "Professions intermédiaires",
                  "Employés et ouvriers \n qualifiés",
                  "Employés et ouvriers \n non qualifiés"]

# Dictionnaire contenant {"profession du père": [liste du pourcentage des enfants de chaque categorie]}
resultsHomme = {
    "Agriculteurs exploitants": [27.6, 9.0, 12.2, 14.8, 26.0, 10.4],
    "Artisans, commerçants et chefs d'entreprise": [0.7, 21.1, 23.1, 22.3, 24.6, 8.3],
    "Cadres et professions intellectuelles supérieures": [0.3, 7.9, 50.4, 25.3, 11.5, 4.6],
    "Professions intermédiaires": [0.5, 7.5, 30.4, 31.2, 23.2, 7.2],
    "Employés et ouvriers qualifiés": [0.6, 7.9, 13.9, 25.0, 40.6, 11.9],
    "Employés et ouvriers non qualifiés": [0.6, 8.7, 9.2, 19.5, 39.7, 22.3]
}

resultsFemme = {
    "Agriculteurs exploitants": [6.5, 4.2, 11.2, 24.9, 31.1, 22.1],
    "Artisans, commerçants et chefs d'entreprise": [0.5, 7.6, 18.6, 27.8, 26.6, 19.0],
    "Cadres et professions intellectuelles supérieures": [0.4, 4.4, 39.0, 32.7, 14.8, 8.7],
    "Professions intermédiaires": [0.3, 3.7, 19.5, 35.6, 26.3, 14.7],
    "Employés et ouvriers qualifiés": [0.5, 3.5, 8.8, 24.0, 35.4, 27.9],
    "Employés et ouvriers non qualifiés": [0.6, 3.1, 6.9, 19.4, 33.6, 36.5]
}

# POUR LES TESTS
results = {
    "Agriculteurs exploitants": [27.6, 9.0, 12.2, 14.8, 26.0, 10.4],
    "Artisans, commerçants et chefs d'entreprise": [0.7, 21.1, 23.1, 22.3, 24.6, 8.3],
    "Cadres et professions intellectuelles supérieures": [0.3, 7.9, 50.4, 25.3, 11.5, 4.6],
    "Professions intermédiaires": [0.5, 7.5, 30.4, 31.2, 23.2, 7.2],
    "Employés et ouvriers qualifiés": [0.6, 7.9, 13.9, 25.0, 40.6, 11.9],
    "Employés et ouvriers non qualifiés": [0.6, 8.7, 9.2, 19.5, 39.7, 22.3]
}

agriculteur = {'Agriculteur': [27.6, 9.0, 12.2, 14.8, 26.0, 10.4]}
category_colors = ["tab:olive", "tab:purple",
                   "tab:blue", "tab:cyan", "tab:brown", "tab:orange"]


""" FIG 1"""


def braH(axe, data, data_cum, category_names, category_colors, labels):
    for i, (colname, color) in enumerate(zip(category_names, category_colors)):
        widths = data[:, i]
        starts = data_cum[:, i] - widths
        axe.barh(labels, widths, left=starts, height=0.5,
                 label=colname, color=color)


fig, ax = plt.subplots(figsize=(10, 4))
labels = list(agriculteur.keys())
data = np.array(list(agriculteur.values()))
data_cum = data.cumsum(axis=1)
ax.xaxis.set_visible(False)

braH(ax, data, data_cum, category_names, category_colors, labels)

ax.legend(bbox_to_anchor=(1, 0.5), loc='center left')
plt.title("Catégorie socioprofessionnelle des hommes\n ayant un père agriculteur")
plt.tight_layout()
plt.show()


""" FIG 2 """


def braH_chiffre(axe, data, data_cum, category_names, category_colors, labels):
    for i, (colname, color) in enumerate(zip(category_names, category_colors)):
        widths = data[:, i]
        starts = data_cum[:, i] - widths
        axe.barh(labels, widths, left=starts, height=0.5,
                 label=colname, color=color)
        xcenters = starts + widths / 2
        for y, (x, c) in enumerate(zip(xcenters, widths)):
            axe.text(x, y, str(float(c)), ha='center', va='center',
                     color='black')


fig, (ax1, ax2) = plt.subplots(2, 1, figsize=(13, 10))
labels = category_names
data = np.array(list(resultsHomme.values()))
data_cum = data.cumsum(axis=1)
ax1.xaxis.set_visible(False)
ax1.set_xlim(0, np.sum(data, axis=1).max())

braH_chiffre(ax1, data, data_cum, category_names, category_colors, labels)

data = np.array(list(resultsFemme.values()))
data_cum = data.cumsum(axis=1)
ax2.xaxis.set_visible(False)
ax2.set_xlim(0, np.sum(data, axis=1).max())

braH_chiffre(ax2, data, data_cum, category_names, category_colors, labels)

plt.legend(category_names, bbox_to_anchor=(1, 1.1), loc='center left')
ax1.set_title("CSP des hommes en fonction de la CSP de leur père")
ax2.set_title("CSP des femmes en fonction de la CSP de leur père")

plt.tight_layout(h_pad=-6)
plt.show()
