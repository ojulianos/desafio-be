# Importando bibliotecas
import numpy as np
import matplotlib.pyplot as plt

# Definindo as constantes
A = np.array([0, 0])
B = np.array([0, 4])
C = np.array([5, 4])

# Calculando o deslocamento vetorial
AB = B - A
AC = C - A

# deslocamento vetorial de AB e AC, utilizando as combinações lineares entre os vetores.
AB_AC = AB + AC

# Mostrando a solução
print(AB_AC)

plt.plot(AB_AC)
plt.show()
