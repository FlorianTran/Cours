package elem

import (
	"testing"
)

//-----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
//* Test vide MinSrc
//-----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------

//* test vide #1
// test si c'est un tableau
func TestVide1MinSrc(t *testing.T) {
	if MinSrc(nil) != -1 {
		t.Fail()
	}
}

//* test vide #2
// test si le tabeau contient des éléments
func TestVide2MinSrc(t *testing.T) {
	if MinSrc([]int{}) != -1 {
		t.Fail()
	}
}

//-----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
//* Test MinSrc
//-----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------

//* test normal #1
// test pour savoir quelle est la place du plus petit elem du tableau {1, 2, 3, 4, 5} ici 1 est le plus petit
func TestErr1MinSrc(t *testing.T) {
	if MinSrc([]int{1, 2, 3, 4, 5}) != 0 {
		t.Fail()
	}
}

//* test normal #2
// test pour savoir quelle est la place du plus petit elem du tableau {5,6,8,4,3,0,5,9} ici 0 est le plus petit
func TestErr2MinSrc(t *testing.T) {
	if MinSrc([]int{5, 6, 8, 4, 3, 0, 5, 9}) != 5 {
		t.Fail()
	}
}

//* test normal #3
// test pour savoir quelle est la place du plus petit elem du tableau {48, 1, 2, 4, 5, 8, 4, 6, 9, -5} ici -5 est le plus petit
func TestErr3MinSrc(t *testing.T) {
	if MinSrc([]int{48, 1, 2, 4, 5, 8, 4, 6, 9, -5}) != 9 {
		t.Fail()
	}
}
