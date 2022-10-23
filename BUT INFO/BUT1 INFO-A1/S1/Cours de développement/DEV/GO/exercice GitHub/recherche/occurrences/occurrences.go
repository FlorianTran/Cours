package occurrences

/*
Étant donnés un nombre entier n et un tableau d'entiers t, la fonction
occurrences doit retourner le nombre de fois que l'entier n apparaît
dans le tableau t.

# Entrées
- n : l'entier à chercher
- t : le tableau dans lequel chercher

# Sortie
- occ : le nombre de fois que n apparaît dans t

# Exemple
occurrences(3, []int{1, 2, 3, 4, 3}) = 2
*/
func occurrences(n int, t []int) (occ int) {
	for i := 0; i<len(t);i++{
		if t[i] == n {
			occ++
		}
	}
	return occ
}
