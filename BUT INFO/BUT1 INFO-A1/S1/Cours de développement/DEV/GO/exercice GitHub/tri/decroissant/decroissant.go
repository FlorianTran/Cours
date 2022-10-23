package decroissant

/*
La fonction décroissant doit trier un tableau d'entiers du plus grand
au plus petit.

# Entrée
- tab : le tableau à trier
*/

func decroissant(tab []int) {
	for i := 0; i < len(tab); i++ {
		for j := i; j > 0 && tab[j-1] < tab[j]; j-- {
			tab[j-1], tab[j] = tab[j], tab[j-1]
		}
	}
}
