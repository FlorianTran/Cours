package main

import "fmt"

func main() {
	var length int = 5
	var capacity int = 10
	var tab []int = make([]int, length, capacity)

	var start int = 13
	var end int = 15
	var t []int = tab[start:end]

	fmt.Println(len(tab), cap(tab))
	fmt.Println(len(t), cap(t))
}
