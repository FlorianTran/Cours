package elem

//* Algorithme qui recherche un élément dans un tableau et retourne vrai si il appartient au tableau
// 		x un entier qui est l'élément à rechercher
//		t un tableau d'entier dans lequel il faut chercher
//	retourne un bool pour savoir si x est appartient au tableau t
func ElemSrc(x int, t []int) bool {
	if len(t) == 0 || t == nil {
		return false
	}
	for i := 0; i < len(t); i++ {
		if t[i] == x {
			return true
		}
	}
	return false
}
