package liste

import "strconv"
import "collections/erreurs"


type Element struct {
	next *Element
	//value interface{}
	value int
}

type List struct {
	root *Element 
}

func Nil() List { return *new(List)}

func Append(liste List,val int) List{
	var newElement *Element = new(Element)
	newElement.value = val
	newElement.next = liste.root

	var newListe List = Nil()
	newListe.root = newElement	
	return newListe
}

func IsEmpty(liste List) bool {
	return liste.root == nil
}

func Head(liste List) (int,error){
	if IsEmpty(liste) {
		return 0, erreurs.NoSuchElement
	} else {
		return liste.root.value, nil
	}
}

func Tail(liste List) (List,error) {
	if IsEmpty(liste) {
		return List{}, erreurs.NoSuchElement
	} else {
		var tail = new(List)
		tail.root = liste.root.next
		return *tail,nil
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

