package main

import (
	"fmt"
	"math/rand"
	"time"
)

func main() {
	rand.Seed(time.Now().UnixNano())
	for i := 0; i < 1000; i++ {
		tmp := rand.Float64()
		fmt.Println(tmp)
	}
}
