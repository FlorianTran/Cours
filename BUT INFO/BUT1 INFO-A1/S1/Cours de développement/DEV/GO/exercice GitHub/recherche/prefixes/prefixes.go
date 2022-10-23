package prefixes

/*
La fonction numPrefixes doit compter le nombre de chaînes de caractères dans un
tableau qui commencent par une chaîne donnée.

# Entrées
- t : un tableau de chaînes de caractères
- s : une chaîne de caractères

# Sorties
- n : le nombre de chaînes de t qui commencent par s

# Exemple
numPrefixes([]string{"bonjour", "bonsoir", "salut", "bye bye"}, "bon") = 2
*/
func numPrefixes(t []string, s string) (n int) {
	if len(s) == 0 {
		return len(t)
	}
	for i := 0; i < len(t); i++ {
		if len(t[i]) > len(s) {
			if f(t[i], s) {
				n++
			}
		}
	}
	return n
}

func f(x, y string) bool {
	var ok bool
	for i := 0; i < len(y); i++ {
		if x[i] == y[i] {
			ok = true
		} else {
			return false
		}
	}
	return ok
}
