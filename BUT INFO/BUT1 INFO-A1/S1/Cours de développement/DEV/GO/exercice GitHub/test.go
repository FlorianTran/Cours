package main


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

