package main

import (
	"fmt"
	"math"
)

// Interface
type Forme interface {
	Perimetre() float64
}

func PlusGrandPerimetre(f1, f2 Forme) bool {
	return f1.Perimetre() > f2.Perimetre()
}

// Implantation pour les carrés
type Carre struct {
	Cote float64
}

func (c Carre) Perimetre() float64 {
	return 4 * c.Cote
}

// Implantation pour les cercles
type Cercle struct {
	Rayon float64
}

func (c Cercle) Perimetre() float64 {
	return 2 * math.Pi * c.Rayon
}

type Rectangle struct {
	longueur float64
	largeur  float64
}

func (c Rectangle) Perimetre() float64 {
	return 2 * (c.longueur + c.largeur)
}

func (c Carre) Aire() float64 {
	return c.Cote * c.Cote
}

func (c Rectangle) Aire() float64 {
	return c.longueur * c.largeur
}

func (c Cercle) Aire() float64 {
	return math.Pi * c.Rayon * c.Rayon
}

func main() {
	var ca Carre = Carre{Cote: 5}
	var ce Cercle = Cercle{Rayon: 2.5}
	var rect Rectangle = Rectangle{longueur: 2, largeur: 4}
	fmt.Println(PlusGrandPerimetre(ca, ce))
	fmt.Println(ca.Aire())
	fmt.Println(ce.Aire())
	fmt.Println(rect.Aire())
}
