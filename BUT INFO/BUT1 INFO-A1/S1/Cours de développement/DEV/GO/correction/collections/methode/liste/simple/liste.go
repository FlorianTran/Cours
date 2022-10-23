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

func Nil() *List { return new(List)}

func (liste *List) Append(val int) {
	var newElement *Element = new(Element)
	newElement.value = val
	newElement.next = liste.root
	liste.root = newElement	

}

func (liste List) IsEmpty() bool {
	return liste.root == nil
}

func (liste List) Head() (int,error) {
	if liste.IsEmpty() {
		return 0, erreurs.NoSuchElement
	} else {
		return liste.root.value, nil
	}
}

func (liste List) Tail() (*List,error) {
	if liste.IsEmpty() {
		return nil, erreurs.NoSuchElement
	} else {
		var tail = new(List)
		tail.root = liste.root.next
		return tail,nil
	}	
} 

func (liste List) ToString() string {
	if liste.IsEmpty() {
		return "nil"
	} else {
		head,_ := liste.Head()
		tail,_ := liste.Tail()
		return "["+strconv.Itoa(head)+"]->"+tail.ToString()
	}
} 

