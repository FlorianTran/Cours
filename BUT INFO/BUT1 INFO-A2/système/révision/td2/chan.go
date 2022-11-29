package main

import "fmt"

func main() {

	var c chan int = make(chan int, 3)

	c <- 1
	c <- 2
	c <- 3

	fmt.Println(<-c)
	fmt.Println(<-c)
	fmt.Println(<-c)

}
