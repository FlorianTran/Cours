package doublons2

import (
	"fmt"
)

/*
On dispose d'un tableau d'entiers de longueur n et on suppose qu'il contient
exactement une fois chaque nombre compris entre 1 et n. On voudrait vérifier
cela. C'est le travail de la fonction doublons.

Coder la fonction doublons de manière à ne parcourir le tableau tab qu'une seule
fois rapportera plus de points.

# Entrée
- tab : un tableau d'entiers

# Sortie
- ok : un booléen qui vaut true si tab contient bien exactement une
fois chaque entier entre 1 et len(tab) et false sinon

# Info
2021-2022, test 1, exercice 8
*/

//! ne marche pas 

func doublons(tab []int) (ok bool) {
	if len(tab) == 0 || tab == nil {
		return true
	}
	var t []int
	for i := 0; i < len(tab)-1; i++ {
		t = append(t, tab[i])
		if tab[i] < tab[i+1] && f(tab, t) {
			ok = true
		} else {
			fmt.Println(t)
			fmt.Println(tab)
			return false
		}
	}
	fmt.Println(t)
	fmt.Println(tab)
	return ok
}

func f(x, y []int) (ok bool) {
	for i := 0; i < len(x)-1; i++ {
		for j := i ; j < len(y); j++ {
			if x[i] == y[j+1] {
				return false
			} else {
				ok = true
			}
		}
	}
	return ok
}
