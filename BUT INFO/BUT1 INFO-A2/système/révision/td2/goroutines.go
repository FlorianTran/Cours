package main

import "fmt"

func iter(ID int) {
	for i := 0; i < 100; i++ {
		fmt.Println("Goroutine", ID, "itération", i)
	}
}

func main() {
	go iter(1)
	iter(2)
}
