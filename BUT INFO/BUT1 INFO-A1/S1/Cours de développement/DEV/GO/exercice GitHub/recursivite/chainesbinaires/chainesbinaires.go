package chainesbinaires

import (
	"fmt"
)

/*
Une chaîne binaire est une chaîne de caractères composée uniquement de 0 et de 1. On s'intéresse ici aux chaînes binaires sans 1 consécutifs.
On peut générer de tels chaînes récursivement en considérant que
- si on dispose d'une chaîne s qui finit par 0 on peut l'étendre par 1 ou par 0, et
- si on dispose d'une chaîne s qui finit par 1 on ne peut l'étendre que par 0.
La fonction calculeChaines utilisera ce procédé (appliqué à chaque chaîne d'un tableau de chaînes) pour engendrer toutes les chaînes binaires sans 1 consécutifs d'une longueur donnée.

# Entrée
- n : un entier indiquant la longueur des chaînes à engendrer.

# Sortie
- chaines : un tableau de string contenant toutes les chaînes binaires de longueur n sans 1 consécutifs.

# Exemple
calculeChaines(3) = [000 001 010 100 101] (l'ordre n'a pas d'importance)
*/
func ajouteChaine(s string, long int) []string {
	var l int = len(s)
	if l == long {
		return []string{s}
	}
	if string(s[l-1]) == "1" {
		return ajouteChaine(s+"0", long)
	}
	return append(ajouteChaine(s+"0", long), ajouteChaine(s+"1", long)...)

}

func calculeChaines(n int) (chaines []string) {
	if n < 0 {
		return []string{}
	}
	if n == 0 {
		return []string{""}
	}
	fmt.Println(append(ajouteChaine("0", n), ajouteChaine("1", n)...))
	return append(ajouteChaine("0", n), ajouteChaine("1", n)...)
}
