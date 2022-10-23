package souschaine

/*
Une chaine sc est une sous chaine d'une chaine s si on peut reconstruire s en rajoutant des lettres à sc. On peut le voir de manière récursive : sc = asc' (avec a en caractère et sc' une chaine) est une sous chaine de s si s = as' et sc' est une sous chaine de s' ou si s = bs' et asc' est une sous chaine de s'.

# Entrées
- s : une chaîne
- sc : une chaîne

# Sortie
- b : un booléen indiquant si sc est une sous chaine de s

# Exemple
sousChaine("abcde", "ace") = true
*/

//! ------------------------------ Ne marche pas ------------------------------ //

func sousChaine(s, sc string) (b bool) {
	x := f(s[0:len(s)-1], sc)

	if len(sc) == x {
		return true
	} else {
		return false
	}
}

func f(s, sc string) int{
	var x int
	if len(s) == 0 {
		return x
	}
	for i := 0; i < len(sc); i++ {
		if s[len(s)] == sc[i] {
			x++
		}
	}
	return x
}
