package elem

import (
	"testing"
	//"Search/err"
)

//-----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
//* Test vide ElemSrc
//-----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------

//* test vide #1
// test si c'est un tableau
func TestVide1ElemSrc(t *testing.T) {
	if ElemSrc(5, nil) != false {
		t.Fail()
	}
}

//* test vide #2
// test si le tabeau contient des éléments
func TestVide2ElemSrc(t *testing.T) {
	if ElemSrc(5, []int{}) != false {
		t.Fail()
	}
}

//-----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
//* Test ElemSrc
//-----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------

//* test normal #1
// test si 6 appartient au tableau {1,2,3,4,5}
func TestErr1ElemSrc(t *testing.T) {
	if ElemSrc(6, []int{1, 2, 3, 4, 5}) != false {
		t.Fail()
	}
}

//* test noraml #2
// test si 5 appartient au tableau {4,9,6,3,7,2,5,1,8,7}
func TestErr2ElemSrc(t *testing.T) {
	if ElemSrc(5, []int{4, 9, 6, 3, 7, 2, 5, 1, 8, 7}) != true {
		t.Fail()
	}
}

//* test noraml #3
// test si -8 appartient au tableau {4,9,6,3,-8,10,7,2,5,1,8,7}
func TestErr3ElemSrc(t *testing.T) {
	if ElemSrc(-8, []int{4, 9, 6, 3, -8, 10, 7, 2, 5, 1, 8, 7}) != true {
		t.Fail()
	}
}

//* test noraml #4
// test si 2 appartient au tableau {2,2,2,2,2}
func TestErr4ElemSrc(t *testing.T) {
	if ElemSrc(2, []int{2, 2, 2, 2, 2}) != true {
		t.Fail()
	}
}
