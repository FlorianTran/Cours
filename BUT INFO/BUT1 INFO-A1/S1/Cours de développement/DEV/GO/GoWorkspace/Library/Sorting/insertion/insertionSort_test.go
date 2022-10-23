package insertion

import "testing"

//-----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
//* Test vide InsertionSort
//-----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------

//* test vide #1
// test si c'est un tableau
func TestVide1InsertionSort(t *testing.T) {
	if InsertionSort(nil) != nil {
		t.Fail()
	}
}

//* test vide #2
// test si c'est un tableau
func TestVide2InsertionSort(t *testing.T) {
	if comparTab(InsertionSort([]int{}), []int{}) {
		t.Fail()
	}
}

//-----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
//* Test InsertionSort
//-----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------

//* test normal #1
// test pour avoir le tableau {2,5,8,9,7,6,3,1} trié par insertion, qui est {1, 2, 3, 5, 6, 7, 8, 9}
func TestErr1InsSort(t *testing.T) {
	if len(InsertionSort([]int{2, 5, 8, 9, 7, 6, 3, 1})) != len([]int{1, 2, 3, 5, 6, 7, 8, 9}) &&
		comparTab(InsertionSort([]int{2, 5, 8, 9, 7, 6, 3, 1}), []int{1, 2, 3, 5, 6, 7, 8, 9}) {
		t.Fail()
	}
}

//* test normal #2
// test pour avoir le tableau {65,7,8,97,32,46,6,24,8,102} trié par insertion, qui est {6, 7, 8, 24, 32, 46, 65, 97, 102}
func TestErr2InsSort(t *testing.T) {
	if len(InsertionSort([]int{65, 7, 8, 97, 32, 46, 6, 24, 8, 102})) != len([]int{6, 7, 8, 24, 32, 46, 65, 97, 102}) &&
		comparTab(InsertionSort([]int{65, 7, 8, 97, 32, 46, 6, 24, 8, 102}), []int{6, 7, 8, 24, 32, 46, 65, 97, 102}) {
		t.Fail()
	}
}

//* test normal #3
// test pour avoir le tableau {8,5,-4,-2,0,6,7} trié par insertion
func TestErr3InsSort(t *testing.T) {
	if len(InsertionSort([]int{8, 5, -4, -2, 0, 6, 7})) != len([]int{-4, -2, 0, 5, 6, 7, 8}) &&
		comparTab(InsertionSort([]int{8, 5, -4, -2, 0, 6, 7}), []int{-4, -2, 0, 5, 6, 7, 8}) {
		t.Fail()
	}
}

//-----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
//* Fonction pour comparer les tableaux
//-----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------

func comparTab(t1 []int, tVrai []int) (ok bool) {
	for i := 0; i < len(t1); i++ {
		if t1[i] == tVrai[i] {
			ok = true
		} else {
			return false
		}
	}
	return ok
}
