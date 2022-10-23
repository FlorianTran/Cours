package list

import (
	"errors"
	"strconv"
)

var ErrNoSuchElement error = errors.New("error no such element")

type Element struct {
	//	on créer un nouveau type Element avec une valeur int et next un pointeur sur le prochain Element
	val  int
	next *Element
}

type List struct {
	//	on créer un nouveau List avec un pointeur root sur Element
	root *Element
}

func New() *List {
	return new(List)
}

func (l *List) IsEmpty() bool {
	//	retourne vrai si l est nil
	return l.root == nil
}

func (l *List) Append(e int) {
	//	créer un élément à partir d'une liste
	var newElement *Element = new(Element) // new() renvoie un pointeur, créer un espace mémoire = newE = {&list}
	newElement.val = e
	newElement.next = l.root
	l.root = newElement
}

func (l *List) Head() (int, error) {
	//	retourne la tête de la liste, la valeur du premier élément de la liste
	if l.IsEmpty() {
		return 0, ErrNoSuchElement
	} else {
		return l.root.val, nil
	}
}

func (l *List) Tail() (*List, error) {
	//	reoutrne la queue de la liste, retourne remplace le contenue par l'élément chainé = décale de 1
	if l.IsEmpty() {
		return nil, ErrNoSuchElement
	} else {
		var tail = new(List)
		tail.root = l.root.next
		return tail, nil
	}
}

func (l List) ToString() string {
	// transforme une liste en string -> permet de voir en string la liste
	if l.IsEmpty() {
		return "nil"
	} else {
		head, _ := l.Head()
		tail, _ := l.Tail()
		return "[" + strconv.Itoa(head) + "]->" + tail.ToString()
	}
}
