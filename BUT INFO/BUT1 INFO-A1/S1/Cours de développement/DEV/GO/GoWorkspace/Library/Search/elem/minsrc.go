package elem

//* Algorithme qui recherche la place du plus petit elem d'un tableau
//		t un tableau d'entier
//	retourne la place du plus petit elem
//	retroune false si il n'est pasdans le tableau
func MinSrc(t []int) int {
	var imin int = 0
	if len(t) == 0 || t == nil {
		return -1
	}
	for i := 1; i < len(t); i++ {
		if t[i] < t[imin] {
			imin = i
		}
	}
	return imin
}
