package nombrespremiers2

import "fmt"

/*
La fonction premiers doit retourner un tableau contenant les nombres
premiers compris entre 0 et un entier n.

# Entrée
- n : un nombre entier

# Sortie
- p : un tableau contenant tous les nombres premiers compris entre 0 et n inclus, s'il n'existe pas de tels nombres premiers, il faut que p soit un tableau contenant 0 éléments

# Exemple
premiers(10) = [2 3 5 7] (l'ordre n'a pas d'importance)
*/
func estPremier(n int) (b bool) {
	var premier bool = !(n == 0 || n == 1)
	var div int = 2

	for div < n && premier {
		premier = (n % div) != 0
		if div == 2 {
			div = div + 1
		} else {
			div = div + 2
		}
	}
	return premier
}

func premiers(n int) (p []int) {
	p = make([]int, 0)
	for i := 0; i < n; i++ {
		if estPremier(i) {
			p = append(p, i)
		}
	}
	fmt.Println(p)
	return p
}
