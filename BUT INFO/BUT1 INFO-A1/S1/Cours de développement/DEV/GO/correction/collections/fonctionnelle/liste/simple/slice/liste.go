package liste

import "strconv"
import "collections/erreurs"

type List struct {
	root [] int 
}

func Nil() List { return List{root:[]int {}}}

func Append(liste List,val int) List{
	var newListe List
	newListe.root = append(liste.root, val)
	return newListe	
}

func IsEmpty(liste List) bool {
	return len(liste.root) == 0
}

func Head(liste List) (int,error){
	if IsEmpty(liste) {
		return 0, erreurs.NoSuchElement
	} else {
		return liste.root[len(liste.root)-1], nil
	}
}

func Tail(liste List) (List,error) {
	if IsEmpty(liste) {
		return List{}, erreurs.NoSuchElement
	} else {
		var newListe List 
		newListe.root = make([] int, len(liste.root)-1) 
		copy(newListe.root,liste.root)
		return newListe,nil
	}	
} 

func ToString(liste List) string {
	if IsEmpty(liste) {
		return "nil"
	} else {
		head,_ := Head(liste)
		tail,_ := Tail(liste)
		return "["+strconv.Itoa(head)+"]->"+ToString(tail)
	}
} 