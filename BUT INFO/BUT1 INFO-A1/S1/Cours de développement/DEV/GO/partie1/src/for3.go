package main

import "fmt"

func main() {
	var reste int = 52
	var quotient int = 8
	const diviseur int = 4
	for reste >= diviseur {
		reste = reste - diviseur
		quotient++
	}
	fmt.Println(quotient)
}
