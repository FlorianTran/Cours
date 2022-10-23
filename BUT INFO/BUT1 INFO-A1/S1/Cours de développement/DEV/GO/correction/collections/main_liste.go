package main
import "fmt"
import "collections/methode/liste/simple"
func main(){
	var uneListe *liste.List

	uneListe = liste.Nil()
	fmt.Println(uneListe.ToString())
	uneListe.Append(10)
	fmt.Println(uneListe.ToString())
	uneListe.Append(20)
	fmt.Println(uneListe.ToString())
	uneListe.Append(30)
	fmt.Println(uneListe.ToString())
	tail, _ := uneListe.Tail()
	fmt.Println(uneListe.ToString())
	tail, _ = tail.Tail()
	fmt.Println(uneListe.ToString())
	tail, _ = tail.Tail()
	fmt.Println(uneListe.ToString())	
	
}