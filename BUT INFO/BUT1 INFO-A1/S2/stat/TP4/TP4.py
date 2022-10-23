from re import M
from turtle import color
import pandas as pd
import geopandas as gpd
import matplotlib.pyplot as plt
import contextily as ctx

# TP4

data = gpd.read_file("a-dep2021.json")
data2 = pd.read_csv('Exercice1_REP/collegiens_REP.csv',sep=",")

data = data.to_crs(epsg=3857)
filter_dep = ["971", "972", "973", "974", "976"]
data = data.query("dep not in @filter_dep")

fig, axes = plt.subplots(1,1,figsize=(12,12))

colors=["#FFFFFF","#E2B5A4","#C48B7D","#A76258","#8A3832","#6C0000"]
pourcentage = [0,2.5,4.5,7.5,12.5,100]

pourcentageCollegien = data2["Part_collegien_REP"].tolist()

colorsList = []

for i in range(len(data)):
    colorsList.append("")
    for j in range(len(pourcentage)):
        if pourcentageCollegien[i] >= pourcentage[j]:
            colorsList[i] = colors[j+1]
        if pourcentageCollegien[i] == 0:
            colorsList[i] = colors[0]
            
data["color"] = pd.DataFrame(colorsList)

data.plot(
    ax = axes, # Axes de trac ́e
    linewidth=0.1, # Epaisseur de la ligne
    edgecolor="black", # Couleur de la ligne
    color = data.color,
    alpha = 0.5 # Transparence de aplat
 )

ctx.add_basemap(ax=axes)
axes.set_axis_off() # Suppression des axes
plt.show()


def mise_en_forme():
    dataHosp = pd.read_csv("Exercice2_COVID/data_covid_hosp.csv", sep =";")
    dataDep = gpd.read_file("a-dep2021.json")

    hospJour = dataHosp["jour"].tolist()

    print(hospJour)

