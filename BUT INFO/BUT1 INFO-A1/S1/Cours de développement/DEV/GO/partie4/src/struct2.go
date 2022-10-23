package main

import "fmt"

type cuple struct {
	first  int
	second int
}

func main() {
	var c1 cuple = cuple{first: 25, second: 2}
	var c2 cuple = cuple{first: 14}
	var c3 cuple = cuple{second: 21}
	fmt.Println(c1, c2, c3)
}
