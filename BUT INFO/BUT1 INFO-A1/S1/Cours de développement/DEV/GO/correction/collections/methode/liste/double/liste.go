//TODO A finir
package liste

//import "strconv"

import "collections/erreurs"

type Element struct {
	next *Element
	prev *Element
	value int
}

type List struct {
	first *Element
	last *Element 
}

func Nil() *List { return new(List)}

//Append 
func (liste *List) Append(val int) {
	var newElement *Element = new(Element)
	newElement.value = val
	newElement.next = liste.first
	newElement.prev = nil
	if liste.first !=nil {
		liste.first.prev = newElement;
	} else {
		liste.last = newElement;
	}
   	liste.first = newElement;	
}

func (liste *List) AppendBack(val int) {
	var newElement *Element = new(Element)
	newElement.value = val
   	newElement.prev = liste.last
   	newElement.next = nil
   if(liste.last !=nil) {
   		liste.last.next = newElement
   } else {
   		liste.first = newElement
   }		
   liste.last = newElement 	
}
