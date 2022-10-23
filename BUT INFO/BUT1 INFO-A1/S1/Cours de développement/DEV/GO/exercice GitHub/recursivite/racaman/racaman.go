package racaman

/*
La suite de Racaman est définie par a(1) = 1, puis pour n > 1 par :
- a(n-1) - n si ce nombre est strictement supérieur à 0 et n'a encore jamais été
vu dans la suite
- a(n-1) + n sinon

La fonction racaman doit calculer a(n) pour n supérieur ou égal à 1.

# Entrée
- n : le numéro du terme de la suite à calculer

# Sortie
- an : la valeur du terme de la suite calculé (si ce terme n'est pas défini, on
retournera -1)

# Exemple
racaman(4) = 2
*/
func racaman(n int) (an int) {
	if n == 1 {
		return 1
	}
	if racaman(n-1)-n > 0 /*n'apartient pas dans la suite*/ {
		if racaman(n-1)-n == 1 {
			return racaman(n-1) + n
		}
		return racaman(n-1) - n
	} else {
		return racaman(n-1) + n
	}
}
