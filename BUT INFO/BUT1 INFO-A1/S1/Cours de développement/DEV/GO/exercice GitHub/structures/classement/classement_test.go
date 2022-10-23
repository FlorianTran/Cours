package classement

import "testing"

func TestExemple(t *testing.T) {
	res := classement([]etudiant{
		{"Berdjugin", "Jean-François", 16.6},
		{"Hadj-Rabia", "Nassim", 15.2},
		{"Tamzalit", "Dalila", 15.2},
		{"Jezequel", "Loïg", 12.3},
		{"Jezequel", "Maël", 12.3},
	})
	attendu := "1. Berdjugin Jean-François\n" +
		"2. Hadj-Rabia Nassim\n" +
		"2. Tamzalit Dalila\n" +
		"4. Jezequel Loïg\n" +
		"4. Jezequel Maël\n"
	if res != attendu {
		t.Error("Votre affichage donne :\n", res,
			"\nEt on attendait :\n", attendu)
	}
}

func TestVide(t *testing.T) {
	res := classement([]etudiant{})
	attendu := ""
	if res != attendu {
		t.Error("Sur un tableau vide, votre programme retourne '", res, "'")
	}
}
