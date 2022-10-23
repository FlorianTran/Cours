package dicosrc

//* Algorithme qui recherche la position d'un elem dans un tableau trié (par dichotomie)
//		x l'entier a chercher
// 		t un tableau trié d'entier
//  retourne la position de l'entier dans le talbeau
func DicoSrc(x int, t []int) int {
	end := len(t) - 1
	start := 0
	var mid int
	for start <= end {
		mid = (start + end) / 2
		if t[mid] == x {
			return mid
		}
		if t[mid] < x {
			start = mid + 1
		} else {
			end = mid - 1
		}
	}
	return -1
}
