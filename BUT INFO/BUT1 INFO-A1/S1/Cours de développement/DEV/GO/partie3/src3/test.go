package main

import (
	"bufio"
	"fmt"
	"log"
	"os"
	"strconv"
	"strings"
)

/*
func main() {
	var myFile *os.File
	var err error

	var x int = 0
	/*var n int
		myFile, err = os.Create("fichiertest")
	if err != nil {
		log.Fatal(err)
	}

	i:=0
	n = 5
	for {
		if(i>10){
			break;
		}
		_, err = fmt.Fprintln(myFile, n," x ", i, " = ", n*i)
		i++
	}*/
/*	myFile, err = os.Create("fichierScan")
	if err != nil {
		log.Fatal(err)
	}

	for i:= 0; i < 5; i++{
		_, err = fmt.Fprintln(myFile, x," ","hi")
		x += i
	}

	err = myFile.Close()
	if err != nil {
		log.Fatal(err)
	}
}
*/
/*
func test(x []int) bool {
	if
}*/

func read() []string {
	var lignes []string

	// Ouverture du fichier
	var filePath string = "notes.csv"
	var myFile *os.File
	var err error
	myFile, err = os.Open(filePath)
	if err != nil {
		log.Fatal(err)
	}

	// Préparation de la lecture
	var scanner *bufio.Scanner
	scanner = bufio.NewScanner(myFile)

	// Lecture des lignes du fichier
	for scanner.Scan() {
		lignes = append(lignes, scanner.Text())
	}

	// Vérification que tout s'est bien passé
	if err != nil {
		log.Fatal(err)
	}

	// Fermeture du fichier
	err = myFile.Close()
	if err != nil {
		log.Fatal(err)
	}
	return lignes
}

// Fonctinon qui converti une ligne en 1 string et 3 int en supriment les virgules
func conv(ligne string) (string, int, int, int) {
	var prenom string
	var note int
	var bonus int
	var total int
	// suprime la virgule
	var tab []string = strings.Split(ligne, ",")
	prenom = tab[0]
	// Convertir avec strconv.Atoi
	note, _ = strconv.Atoi(tab[1])
	bonus, _ = strconv.Atoi(tab[2])
	total, _ = strconv.Atoi(tab[3])
	return prenom, note, bonus, total
}

// Fonction qui valide si les notes + le bonus est = total
func validate(data []string) (nos []int) {
	for i := 0; i < len(data); i++ {
		var note, bonus, total int
		// _ on enlève le prenom car inutile avec _
		_, note, bonus, total = conv(data[i])
		if total != note+bonus {
			nos = append(nos, i+2)
		}
	}
	return nos
}

func note(data []string) (tab []string) {
	for i := 0; i < len(data); i++ {
		var prenom string
		prenom, _, _, _ = conv(data[i])
		tab = append(tab, prenom)
	}
	return tab
}

func moyenne(data []string) (moy int) {
	var somme int
	for i := 0; i < len(data); i++ {
		var total int
		_, _, _, total = conv(data[i])
		somme += total
	}
	moy = somme / (len(data))
	return moy
}

func main() {
	var lignes []string = read()
	var lignesData []string = lignes[1:]
	//fmt.Println(conv("Christine,18,1,19"))

	//fmt.Println(lignes)
	fmt.Println(validate(lignesData))

	//	fmt.Println(note(lignesData))

	fmt.Println(moyenne(lignesData))
}
