package compter

import "testing"

func TestEgal(t *testing.T) {
	s := compter(5, 5)
	if s != "5" {
		t.Error("compter(5, 5) devrait retourner \"5\" mais retourne \"", s, "\"")
	}
}

func TestVide(t *testing.T) {
	s := compter(5, 2)
	if s != "" {
		t.Error("compter(5, 2) devrait retourner une chaîne vide mais retourne \"", s, "\"")
	}
}

func TestBasique(t *testing.T) {
	s := compter(2, 5)
	if s != "2+3+4+5+4+3+2" {
		t.Error("compter(2, 5) devrait retourner \"2+3+4+5+4+3+2\" mais retourne \"", s, "\"")
	}
}
