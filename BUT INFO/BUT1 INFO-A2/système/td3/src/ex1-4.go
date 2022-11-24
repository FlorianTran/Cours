package main

import (
	"fmt"
	"sync"
)

var res int
var w sync.WaitGroup
var mu sync.Mutex

// calcule n puissance m
func puissance(n, m int) {
	mu.Lock()
	res = 1
	for i := 0; i < m; i++ {
		res *= n
	}
	fmt.Println(n, "puissance", m, "vaut", res)
	w.Done()
	mu.Unlock()
	return
}

func main() {

	for i := 0; i < 10; i++ {
		for j := 0; j < 3; j++ {
			w.Add(1)
			go puissance(i, j)
		}
	}

	w.Wait()
}
