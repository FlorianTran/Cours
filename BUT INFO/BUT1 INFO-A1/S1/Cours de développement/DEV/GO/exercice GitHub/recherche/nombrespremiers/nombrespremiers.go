package nombrespremiers1

/*
La fonction selectionPremiers filtre le contenu d'un tableau d'entiers pour ne garder que ceux qui sont des nombres premiers.

# Entrée
- t : un tableau d'entiers

# Sortie
- p : un tableau contenant tous les nombres premiers de t, si t est vide, p doit être identique à t

# Exemple
selectionPremiers([]int{1, 2, 3, 4, 5}) = [2 3 5] (l'ordre n'a pas d'importance)
*/

func selectionPremiers(t []int) (p []int) {
	if len(t) == 0 || t == nil {
		p = t
		return p
	}
	for i := 0; i < len(t); i++ {
		if estPremier(t[i]) {
			p = append(p, t[i])
		}
	}
	if len(p) == 0 || p == nil {
		p = []int{}
	}
	return p
}

func estPremier(x int) (ok bool) {
	var n int
	for i := 1; i <= x; i++ {
		if x%i == 0 {
			n++
		}
	}
	if n == 2 {
		return true
	}
	return ok
}
