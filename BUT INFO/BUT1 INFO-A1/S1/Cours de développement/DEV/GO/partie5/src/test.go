package main

import "log"

func replie(t []int, f func(x, y int) int) int {
	if len(t) == 0 {
		return 0
	}
	var res int = t[0]
	for i := 1; i < len(t); i++ {
		res = f(res, t[i])
	}
	return res
}

func add(x, y int) int {return x + y}

func main() {
	var tabTest []int = []int{5, 2, 5, 4, 8}

	log.Print(replie(tabTest, add))
}
