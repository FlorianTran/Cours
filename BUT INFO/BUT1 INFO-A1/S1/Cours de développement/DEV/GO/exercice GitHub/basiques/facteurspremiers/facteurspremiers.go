package facteurspremiers

import "fmt"

/*
La fonction facteursPremiers doit retourner un tableau contenant la liste de tous
les facteurs premiers d'un entier n, doublons compris

# Entrée
- n : un nombre entier positif

# Sortie
- facteurs : un tableau contenant tous les facteurs premiers de n, si n vaut 0 il
faut retourner un tableau à zéro éléments.

# Exemple
premiers(24) = [2 2 2 3] (l'ordre n'a pas d'importance)
*/
func facteursPremiers(n uint) (facteurs []uint) {
	facteurs = make([]uint, 0)
	var div uint = 2
	for n > 1 {
		if n%div == 0 {
			facteurs = append(facteurs, div)
			n = n / div
		} else {
			if div > 2 {
				div = div + 2
			} else {
				div = div + 1
			}
		}
	}
	fmt.Println(facteurs)
	return facteurs
}
