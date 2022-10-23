package main

import (
	"bufio"
	"log"
	"os"
)

func main() {
	var n int = 0
	// Ouverture du fichier
	var filePath string = "fichiertest"
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
	for scanner.Scan() && n < 5 {
		log.Print("Je viens de lire: ", scanner.Text())
		n++
	}

	log.Print("Il y a: ",n ," lignes ")
	// Vérification que tout s'est bien passé
	if scanner.Err() != nil {
		log.Fatal(scanner.Err())
	}

	// Fermeture du fichier
	err = myFile.Close()
	if err != nil {
		log.Fatal(err)
	}
}
