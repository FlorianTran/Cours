package elem

import "testing"

//-----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
//* Test vide SelectElem
//-----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------

//* test vide #1
// test si c'est un tableau
func TestVide1SelectElem(t *testing.T) {
	if SelectElem(5, nil) != nil {
		t.Fail()
	}
}

//* test vide #2
// test si c'est un tableau
func TestVide2SelectElem(t *testing.T) {
	if SelectElem(5, []int{}) != nil {
		t.Fail()
	}
}

//-----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
//* Test SelectElem
//-----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------

//* test normal #1
// test pour avoir un tableau de tous les nombres inférieur à 5 dans le tableau {2,5,8,9,7,6,3,1} ici c'est {2,1,3}
func TestErr1SelectElem(t *testing.T) {
	var tab1 []int
	var tab2 []int
	tab1 = testTab1(5, []int{2, 5, 8, 9, 7, 6, 3, 1})
	tab2 = SelectElem(5, []int{2, 5, 8, 9, 7, 6, 3, 1})
	if comparTab(tab1, tab2) != true {
		t.Fail()
	}
}

//* test normal #2
// test pour avoir un tableau de tous les nombres inférieur à 5 dans le tableau {-5,83,4,8,6,2,7,1,9,7,8,1} ici c'est {2,1,3}
func TestErr2SelectElem(t *testing.T) {
	var tab1 []int
	var tab2 []int
	tab1 = testTab1(8, []int{-5, 83, 4, 8, 6, 2, 7, 1, 9, 7, 8, 1})
	tab2 = SelectElem(8, []int{-5, 83, 4, 8, 6, 2, 7, 1, 9, 7, 8, 1})
	if comparTab(tab1, tab2) != true {
		t.Fail()
	}
}

//-----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
//* func pour tester
//-----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------

func testTab1(x int, t []int) []int {
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

func comparTab(tab1 []int, tab2 []int) (ok bool) {
	if len(tab1) != len(tab2) {
		ok = false
		return ok
	}
	for i := 0; i < len(tab1); i++ {
		if tab1[i] == tab2[i] {
			ok = true
		} else {
			ok = false
		}
	}
	return ok
}

//? test avec err, il faut mettre un return err le prog main
/*
func TestVide1SelectElem(t *testing.T) {
	if t, e := SelectElem(5, nil); e != err.ErrNotArray || len(t) != 0 {
		t.Fail()
	}
}
*/
