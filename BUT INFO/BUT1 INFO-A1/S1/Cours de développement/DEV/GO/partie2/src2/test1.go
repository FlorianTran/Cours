package main

import(

	"fmt"

) 


/*
func f(n int) []int {
	var tab []int = make([]int, 11)
	for i := 0; i < len(tab); i++ {
		tab[i]= n*i
	}
	return tab
}

func main() {
	var x int = 100
	fmt.Println(f(x))
}*/

/*
func main() {
	var tab [][]int = [][]int {c
		[]int{1,2,3},
		[]int{0,5,10},
		[]int{10,20,30},
		[]int{0,0,0},
	} 

	fmt.Println(tab[0][1])
}*/
/*
func main() {
	x, e := strconv.Atoi(os.Args[1])
	fmt.Println(x)
	fmt.Println(e)

}
*/

func main() {
	var x int = 5
	var tab []int
	for i := 0; i <= len(tab); i++ {
		tab[i]= x*i
	}
	fmt.Println(tab)

}

