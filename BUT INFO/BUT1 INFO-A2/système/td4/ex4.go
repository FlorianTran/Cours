package main

import "fmt"

func ping(done chan bool) {
	for i := 0; i < 5; i++ {
		fmt.Println("Ping")
	}
	done<-true
}

func main() {
	done := make(chan bool, 1)
	go ping(done)
	<-done
}
