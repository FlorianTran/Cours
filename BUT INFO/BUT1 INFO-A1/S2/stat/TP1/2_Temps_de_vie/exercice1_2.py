import pandas as pd
import numpy as np
import matplotlib.pyplot as plt


data = pd.read_csv('temps_de_vie.csv', sep=',')

plt.hist(data['0'], 30)
plt.title('Histogramme de la répartition des temps de vie')
plt.show()
