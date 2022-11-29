package main

import (
	"fmt"
	"math/rand"
	"time"
)

func routine(c chan int) {
	wait := rand.Intn(1000)
	time.Sleep(time.Duration(wait) * time.Millisecond)
	c <- wait
}

func main() {

	rand.Seed(int64(time.Now().Nanosecond()))

	c1 := make(chan int)
	c2 := make(chan int)

	go routine(c1)
	go routine(c2)

	select {
	case w := <-c1:
		fmt.Println("La première goroutine a été la plus rapide.")
		fmt.Println("Elle a mis", w, "millisecondes.")
	case w := <-c2:
		fmt.Println("La deuxième goroutine a été la plus rapide.")
		fmt.Println("Elle a mis", w, "millisecondes.")
	}

}
