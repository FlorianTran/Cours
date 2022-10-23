package main 
import (
	"fmt"
)

func main() {
	var tab []int = make([]int ,5,7)
	fmt.Println(tab)
	tab = append(tab,2,5,5)
	fmt.Println(tab)
}