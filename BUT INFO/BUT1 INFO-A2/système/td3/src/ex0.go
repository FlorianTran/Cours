package main

import (
	"fmt"
	"sync"
)

var x, y int
var w sync.WaitGroup
var mu sync.Mutex

func switchxy() {
	mu.Lock()
	for i := 0; i < 1000; i++ {
		x, y = y, x
	}
	mu.Unlock()
	w.Done()
}

func main() {
	x = 5
	y = 7
	w.Add(1000)
	for i := 0; i < 1000; i++ {
		go switchxy()
	}
	w.Wait()
	fmt.Println("x vaut", x, "et y vaut", y)
}
