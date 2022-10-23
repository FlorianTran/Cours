package alphabetique

/*
La fonction alphabetique trie un tableau de chaînes de caractères dans l'ordre
alphabétique.

# Entrée
- dico : le tableau de chaînes de caractères à trier
*/

/* func alphabetique(dico []string) {
	for i := 0; i < len(dico); i++ {
		for j := i; j > 0 && dico[j-1] > dico[j]; j-- {
			dico[j], dico[j-1] = dico[j-1], dico[j]
		}
	}
} */

func alphabetique(dico []string) {
	var tmp string
	for i := 0; i < len(dico); i++ {
		for j := i + 1; j < len(dico); j++ {
			if dico[i] > dico[j] {
				tmp = dico[i]
				dico[i] = dico[j]
				dico[j] = tmp
			}
		}
	}
}
