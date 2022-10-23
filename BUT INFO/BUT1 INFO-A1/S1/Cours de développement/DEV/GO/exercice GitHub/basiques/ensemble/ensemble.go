package ensemble

import "fmt"

/*
Un ensemble d'entier est un paquet de plusieurs entiers, sans doublons.
La fonction estEnsemble doit indiquer si en tableau d'entiers correspond à un
ensemble ou non.

# Entrée
- E : un tableau d'entiers

# Sortie
- b : un booléen indiquant si E est bien un ensemble ou non (nil n'est pas un ensemble)

# Exemples
estEnsemble([]int{1, 2, 3}) = true
estEnsemble([]int{1, 2, 2}) = false
*/
func estEnsemble(E []int) (b bool) {
	b = true
	if E == nil  {
		return false
	}
	
	if  len(E)== 0 {
		return true
	}
	
		fmt.Println(E)
		for i := 0; i < len(E) && b; i++ {
			b=true
			for j := i + 1; j < len(E) && b; j++ {
				if E[i] == E[j] {
					b = false
				} 
			}
		
		}
		fmt.Println(E,b)
		return b
	
}
