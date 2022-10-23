package dicosrc

import (
	"testing"
)

//-----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
//* Test DicoSrc
//-----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------

//* test vide #1
// test si c'est un tableau
func TestVide1DicoSrc(t *testing.T) {
	if DicoSrc(5, nil) != -1 {
		t.Fail()
	}
}

//* test vide #2
// test si le tabeau contient des éléments
func TestVide2DicoSrc(t *testing.T) {
	if DicoSrc(5, []int{}) != -1 {
		t.Fail()
	}
}

//-----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
//* Test DicoSrc
//-----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------

//* test normal #1
// test pour savoir quelle est la place de x dans le tableau {1, 2, 3, 4, 5} ici 1 est en position 0
func TestErr1DicoSrc(t *testing.T) {
	if DicoSrc(1, []int{1, 2, 3, 4, 5}) != 0 {
		t.Fail()
	}
}

//* test normal #2
// test pour savoir quelle est la place de x dans le tableau {5, 6, 8, 4, 3, 0, 5, 9} ici 0 est en position 5
func TestErr2DicoSrc(t *testing.T) {
	if DicoSrc(7, []int{2, 3, 4, 5, 5, 7, 8, 9}) != 5 {
		t.Fail()
	}
}

//* test normal #3
// test pour savoir quelle est la place de x dans le tableau {48, 1, 2, 4, 5, 8, 4, 6, 9, -5} ici -5 est en position 9
func TestErr3DicoSrc(t *testing.T) {
	if DicoSrc(48, []int{1, 2, 4, 4, 5, 6, 8, 9, 48}) != 8 {
		t.Fail()
	}
}

//* test normal #4
// test pour savoir quelle est la place de x dans le tableau {48, 1, 2, 4, 5, 8, 4, 6, 9, -5} ici -5 est en position 9
func TestErr4DicoSrc(t *testing.T) {
	if DicoSrc(8, []int{3, 4, 6, 8, 9}) != 3 {
		t.Fail()
	}
}
