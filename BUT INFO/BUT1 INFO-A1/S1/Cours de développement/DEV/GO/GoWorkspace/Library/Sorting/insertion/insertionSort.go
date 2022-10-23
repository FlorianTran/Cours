package insertion

import "fmt"

//* Tri par insertion : cet algorithme tri les élément d'un tableau un par un
// 		t un tableau d'entier pas trié
//	retourne un tableau trié
func InsertionSort(t []int) []int {
	if len(t) == 0 || t == nil {
		return t
	}
	for i := 0; i < len(t); i++ {
		for j := i; j > 0 && t[j-1] > t[j]; j-- {
			t[j], t[j-1] = t[j-1], t[j]
		}
	}
	fmt.Println(t)
	return t
}
