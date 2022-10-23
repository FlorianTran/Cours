package monnaie

import (
	"errors"
	"fmt"
)

var errPasAssezPaye error = errors.New("le montant payé est inférieur au montant de l'achat, impossible de rendre la monnaie")

/*
Étant donnés un montant d'achat en euros et un montant payé en euros,
la fonction rendreMonnaie retourne la somme qu'il faut rendre au client.

# Entrées
- eurosAchat : la partie entière du montant d'achat en euros
- centimesAchat : la partie décimale du montant d'achat (donc les centimes)
- eurosPayes : la partie entière du montant payé en euros
- centimesPayes : la partie décimale du montant payé (donc les centimes)

# Sorties
- eurosRendus : la partie entière du montant à rendre en euros
- centimesRendus : la partie décimale du montant à rendre (donc les centimes)
- err : une erreur qui doit être errPasAssezPaye si le montant payé est inférieur au montant de l'achat et nil sinon

# Exemple
rendreMonnaie(12, 20, 15, 0) = 2, 80
*/
func rendreMonnaie(eurosAchat, centimesAchat, eurosPayes, centimesPayes int) (eurosRendus, centimesRendus int, err error) {
	centimesRendus = centimesPayes - centimesAchat
	eurosRendus = eurosPayes - eurosAchat

	if centimesPayes < centimesAchat {
		eurosRendus--
		centimesRendus += 100
	}

	if eurosPayes < eurosAchat {
		err = errPasAssezPaye
	}
	if eurosPayes == eurosAchat && centimesPayes < centimesAchat {
		err = errPasAssezPaye
	}

	fmt.Println(eurosRendus, centimesRendus, err)
	return eurosRendus, centimesRendus, err
}
