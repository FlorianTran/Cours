package main

import (
	"etudiant"
	"fmt"
)

type promotion struct {
	Nom   string
	Liste []etudiant.Etudiant
}

func (p promotion) Classer() ([]float32, []string) {
	var moy []float32
	var nom []string
	for i := 0; i < len(p.Liste); i++ {
		moy = append(moy, p.Liste[i].Moyenne())
		nom = append(nom, p.Liste[i].Fusion())
	}
	return InsertionSort(moy, nom)
}

func main() {
	var e0 etudiant.Etudiant = etudiant.Etudiant{Nom: "Jackson", Prenom: "Mike", Notes: []float32{10, 15, 18, 17, 12}}
	var e1 etudiant.Etudiant = etudiant.Etudiant{Nom: "Michou", Prenom: "Sardou", Notes: []float32{2, 5, 3, 4.5}}
	var e2 etudiant.Etudiant = etudiant.Etudiant{Nom: "Freezer", Prenom: "Corleon", Notes: []float32{6.77, 19, 8}}
	var prom0 promotion = promotion{Nom: "La promo 0", Liste: []etudiant.Etudiant{e0, e1, e2}}
	fmt.Println(prom0.Classer())
}

//-------------------------------------------------------------------------------------------------------------------------------------

func InsertionSort(t []float32, Nom []string) ([]float32, []string) {
	if len(t) == 0 || t == nil {
		return t, Nom
	}
	for i := 0; i < len(t); i++ {
		for j := i; j > 0 && t[j-1] > t[j]; j-- {
			t[j], t[j-1] = t[j-1], t[j]
			Nom[j], Nom[j-1] = Nom[j-1], Nom[j]
		}
	}
	return t, Nom
}
