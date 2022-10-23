package elem

//* Algorithme qui recherche tous les elem plus petit que x dans un tableau
// 		x un entier
//		t un tableau d'entier
//	retourne un tableau avec tous les entier plus petit que x
func SelectElem(x int, t []int) []int {
	var tStock []int
	if len(t) == 0 || t == nil {
		return tStock
	}
	for i := 0; i < len(t); i++ {
		if t[i] < x {
			tStock = append(tStock, t[i])
		}
	}
	return tStock
}
