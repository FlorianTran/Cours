package recherche

/*
La fonction recherche doit indiquer si une valeur v est présente ou pas dans
un tableau d'entiers

Vous ne devez pas utiliser de boucles, la fonction recherche sera donc récursive.

Vous pouvez vous baser sur la remarque suivante : v appartient à tab si et
seulement si v appartient à la première moitié de tab ou v appartient à la
deuxième moitié de tab.

# Entrées
- tab : le tableau dans lequel chercher
- v : la valeur à chercher

# Sortie
- found : un booléen indiquant si v est présente dans tab ou pas
*/

func recherche(tab []int, v int) (existe bool) {
	if (len(tab) == 0 || tab == nil) {
		return false
	}
	if len(tab) <= 0 {
		return false
	}
	if v == tab[len(tab)-1] {
		return true
	}
	return recherche(tab[0 : len(tab)-1],v)
}
