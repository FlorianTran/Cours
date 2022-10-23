package classer

import "testing"

func TestVide(t *testing.T) {
	res := classer([]etudiant{})
	attendu := []etudiant{}
	if !egal(res, attendu) {
		t.Error("Le résultat attendu était un tableau vide, ",
			"mais votre fonction retourne ", res)
	}
}

func TestExemple(t *testing.T) {
	res := classer([]etudiant{
		{"Jezequel", "Maël", 12.3},
		{"Berdjugin", "Jean-François", 16.6},
		{"Tamzalit", "Dalila", 15.2},
		{"Hadj-Rabia", "Nassim", 15.2},
		{"Jezequel", "Loïg", 12.3},
	})
	attendu := []etudiant{
		{"Berdjugin", "Jean-François", 16.6},
		{"Hadj-Rabia", "Nassim", 15.2},
		{"Tamzalit", "Dalila", 15.2},
		{"Jezequel", "Loïg", 12.3},
		{"Jezequel", "Maël", 12.3},
	}
	if !egal(res, attendu) {
		t.Error("Le résultat attendu était ", attendu,
			" mais votre fonction retourne ", res)
	}
}

// fonction utilitaire pour les tests
func egal(t1, t2 []etudiant) bool {
	if len(t1) != len(t2) {
		return false
	}
	for i := 0; i < len(t1); i++ {
		if t1[i] != t2[i] {
			return false
		}
	}
	return true
}
