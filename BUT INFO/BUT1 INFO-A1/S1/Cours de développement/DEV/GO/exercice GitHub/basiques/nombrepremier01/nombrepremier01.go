package nombrepremier01

/*
La fonction estPremier doit indiquer  par un booléen si un nombre est premier
ou pas

# Entrée
- n : un nombre entier

# Sortie
- b : un booléen indiquant si n est premier ou pas

# Exemples
estPremier(5) = true
estPremier(10) = false
*/
func estPremier(n int) (b bool) {
	var premier bool = !(n == 0 || n == 1)
	var div int = 2

	for div < n && premier {
		premier = (n % div) != 0
		if div == 2 {
			div = div + 1
		} else {
			div = div + 2
		}
	}
	return premier
}
