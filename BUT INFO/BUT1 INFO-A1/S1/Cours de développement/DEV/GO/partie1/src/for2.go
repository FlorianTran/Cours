package main

import "fmt"

func main() {
	var i int
	for i = 0; i < 10; i = i + 2 {
		fmt.Println(i)
	}
	fmt.Println(i)
}
