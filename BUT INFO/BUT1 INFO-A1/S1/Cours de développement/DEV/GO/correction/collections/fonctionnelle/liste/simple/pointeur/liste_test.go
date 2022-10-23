package liste

import "testing"
import "collections/erreurs"

func TestSimpleListeVide(t *testing.T){
	var uneListe List
	uneListe = Nil()
	if !IsEmpty(uneListe){
		t.Fail()
	}
	_,err1 := Head(uneListe)
	if err1!= erreurs.NoSuchElement {
		t.Fail()
	}

	_, err2 := Tail(uneListe)
	if err2!= erreurs.NoSuchElement {
		t.Fail()
	}	
}

func TestSimpleListeAppend1(t *testing.T){
	var uneListe List
	uneListe = Nil()
	uneListe = Append(uneListe,10)
	if IsEmpty(uneListe){
		t.Fail()
	}
	h,err1 := Head(uneListe)
	if err1!=nil || h!=10 {
		t.Fail()
	} 
	tail, err2 := Tail(uneListe)
	if err2 != nil || !IsEmpty(tail) {
		t.Fail()
	} 
}

func TestSimpleListeAppend2(t *testing.T){
	var uneListe List
	uneListe = Nil()
	uneListe = Append(uneListe,10)
	uneListe = Append(uneListe,20)

	if IsEmpty(uneListe){
		t.Fail()
	}
	h,err1 := Head(uneListe)
	if err1!=nil || h!=20 {
		t.Fail()
	} 
	tail, err2 := Tail(uneListe)
	if err2 != nil || IsEmpty(tail) {
		t.Fail()
	} 

	h, err1 = Head(tail)
	if err1!=nil || h!=10 {
		t.Fail()
	} 
	tail, err2 = Tail(tail)
	if err2 != nil || !IsEmpty(tail) {
		t.Fail()
	}
}


func TestSimpleListeToString1(t *testing.T){
	var uneListe List
	uneListe = Nil()
	
	if ToString(uneListe)!="nil" {
		t.Fail()
	}
}
func TestSimpleListeToString2(t *testing.T){
	var uneListe List
	uneListe = Nil()
	uneListe = Append(uneListe, 10)
	
	if ToString(uneListe)!="[10]->nil" {
		t.Fail()
	}
}

func TestSimpleListeToString3(t *testing.T){
	var uneListe List
	uneListe = Nil()
	uneListe=Append(uneListe,10)
	uneListe=Append(uneListe,20)
	if ToString(uneListe)!="[20]->[10]->nil" {
		t.Fail()
	}
}