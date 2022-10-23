package compte

/*
La fonction compte doit indiquer combien de fois une valeur v apparaît dans un
tableau tab.

Vous ne devez pas utiliser de boucles, la fonction compte sera donc récursive.

Vous pouvez vous baser sur la remarque suivante : le nombre de fois que v apparaît
dans tab est la somme du nombre de fois où v apparaît dans la première moitié
de tab et du nombre de fois où v apparaît dans la deuxième moité de tab.

# Entrées
- tab : un tableau d'entiers
- v : la valeur à chercher

# Sortie
- num : le nombre de fois que v apparaît dans tab
*/

func compte(tab []int, v int) (num int) {
	if len(tab) == 0 || tab == nil {
		return num
	}
	if len(tab) <= 0 {
		return num
	}
	if tab[len(tab)-1] == v {
		return 1 + compte(tab[0:len(tab)-1], v)
	}
	return compte(tab[0:len(tab)-1], v)
}
