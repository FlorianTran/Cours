package main

func fval(x int) int {
	return 2*x + 1
}

func fref(a *int) {
	*a = 2*(*a) + 1
}

func main() {
	var n int = 5
	n = fval(n)

	var m int = 5
	fref(&m)
}
