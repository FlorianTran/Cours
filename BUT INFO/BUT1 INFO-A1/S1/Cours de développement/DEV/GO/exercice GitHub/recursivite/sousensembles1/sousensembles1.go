package sousensembles1

import (
	"errors"
)

var errPasEnsemble error = errors.New("ceci n'est pas un ensemble")

/*
Étant donné un ensemble E on peut construire tous ces sous-ensembles de manière récursive en remarquant que si E' est E\{x}
pour un élément x de E, alors les sous-ensembles de E sont les sous-ensembles de E' auxquels s'ajoutent ces mêmes sous-ensembles augmentés de x.
La fonction sousEnsembles doit mettre en œuvre cette construction.

# Entrée
- E : un tableau représentant un ensemble d'entiers

# Sortie
- PE : un tableau de tableaux contenant tous les sous-ensembles de E (sans doublons)
- err : une erreur qui vaut errPasEnsemble si et seulement si E n'est pas un ensemble (il contient plusieurs fois la même valeur ou il vaut nil)

# Exemple
sousEnsembles([]int{1, 2}) = [[] [1] [2] [1 2]] (l'ordre des ensembles et les ordres des valeurs dans les ensembles n'ont pas d'importance)
*/
func sousEnsembles(E []int) (PE [][]int, err error) {
	if estEnsemble(E) == false {
		return PE, errPasEnsemble
	}

	var PEP [][]int
	var e int
	if len(E) == 0 {

		return [][]int{}, err
	}

	PEP, _ = sousEnsembles(E[:len(E)-1])
	e = E[len(E)-1]

	//P({1,2}) ? => [[],[1],[2],[1,2]]
	//P({1}) ? => [[],[1]]
	//PEP P({1}), e = 2

	PE = append(PE /*???*/)

	return PE, err
}

func estEnsemble(E []int) bool {
	if E == nil {
		return false
	}
	for i := 0; i < len(E); i++ {
		for j := i; j < len(E)-1; j++ {
			if E[i] == E[j] {
				return false
			}
		}

	}
}

func f() {
}
