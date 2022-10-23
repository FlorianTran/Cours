package decroissant

import "testing"

func TestVide(t *testing.T) {
	tab := []int{}
	decroissant(tab)
	if len(tab) != 0 || tab == nil {
		t.Fail()
	}
	tab = nil
	decroissant(tab)
	if tab != nil {
		t.Fail()
	}
}

func TestDejaTrie(t *testing.T) {
	tab := []int{5, 4, 3, 2, 1}
	decroissant(tab)
	if len(tab) != 5 {
		t.Fail()
	} else if tab[0] != 5 ||
		tab[1] != 4 ||
		tab[2] != 3 ||
		tab[3] != 2 ||
		tab[4] != 1 {
		t.Fail()
	}
}

func TestCroissant(t *testing.T) {
	tab := []int{1, 2, 3, 4, 5}
	decroissant(tab)
	if len(tab) != 5 {
		t.Fail()
	} else if tab[0] != 5 ||
		tab[1] != 4 ||
		tab[2] != 3 ||
		tab[3] != 2 ||
		tab[4] != 1 {
		t.Fail()
	}
}

func TestMelange(t *testing.T) {
	tab := []int{3, 5, 2, 1, 4}
	decroissant(tab)
	if len(tab) != 5 {
		t.Fail()
	} else if tab[0] != 5 ||
		tab[1] != 4 ||
		tab[2] != 3 ||
		tab[3] != 2 ||
		tab[4] != 1 {
		t.Fail()
	}
}

func TestEgaux(t *testing.T) {
	tab := []int{3, 5, 3, 1, 4}
	decroissant(tab)
	if len(tab) != 5 {
		t.Fail()
	} else if tab[0] != 5 ||
		tab[1] != 4 ||
		tab[2] != 3 ||
		tab[3] != 3 ||
		tab[4] != 1 {
		t.Fail()
	}
}
