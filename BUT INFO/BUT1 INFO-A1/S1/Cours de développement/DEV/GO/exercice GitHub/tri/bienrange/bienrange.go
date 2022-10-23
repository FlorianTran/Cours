package bienrange

/*
La fonction bienrange indique si un tableau d'entiers est bien trié par ordre
croissant ou pas.

# Entrée
- tab : le tableau d'entiers à analyser

# Sortie
- estrange : un booléen qui vaut true si les entiers de tab sont bien triés en
ordre croissant et false s'ils ne sont pas bien triés.
*/

func bienrange(tab []int) (estrange bool) {
	estrange = true
	if len(tab) == 0 || tab == nil {
		return estrange
	}
	for i := 0; i < len(tab)-1; i++ {
		if tab[i] > tab[i+1] {
			estrange = false
			return estrange
		}
	}
	return estrange
}
