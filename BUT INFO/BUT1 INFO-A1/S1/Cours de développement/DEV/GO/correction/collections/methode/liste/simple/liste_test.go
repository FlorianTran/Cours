package liste

import "testing"
import "collections/erreurs"

func TestSimpleListeVide(t *testing.T){
	var uneListe *List
	uneListe = Nil()
	if !uneListe.IsEmpty(){
		t.Fail()
	}
	_,err1 := uneListe.Head()
	if err1!= erreurs.NoSuchElement {
		t.Fail()
	}

	_, err2 := uneListe.Tail()
	if err2!= erreurs.NoSuchElement {
		t.Fail()
	}	
}

func TestSimpleListeAppend1(t *testing.T){
	var uneListe *List
	uneListe = Nil()
	uneListe.Append(10)
	if uneListe.IsEmpty(){
		t.Fail()
	}
	h,err1 := uneListe.Head()
	if err1!=nil || h!=10 {
		t.Fail()
	} 
	tail, err2 := uneListe.Tail()
	if err2 != nil || !tail.IsEmpty() {
		t.Fail()
	} 
}


func TestSimpleListeAppend2(t *testing.T){
	var uneListe *List
	uneListe = Nil()
	uneListe.Append(10)
	uneListe.Append(20)

	if uneListe.IsEmpty(){
		t.Fail()
	}
	h,err1 := uneListe.Head()
	if err1!=nil || h!=20 {
		t.Fail()
	} 
	tail, err2 := uneListe.Tail()
	if err2 != nil || tail.IsEmpty() {
		t.Fail()
	} 

	h, err1 = tail.Head()
	if err1!=nil || h!=10 {
		t.Fail()
	} 
	tail, err2 = tail.Tail()
	if err2 != nil || !tail.IsEmpty() {
		t.Fail()
	}
}


func TestSimpleListeToString1(t *testing.T){
	var uneListe *List
	uneListe = Nil()
	
	if uneListe.ToString()!="nil" {
		t.Fail()
	}
}
func TestSimpleListeToString2(t *testing.T){
	var uneListe *List
	uneListe = Nil()
	uneListe.Append(10)
	
	if uneListe.ToString()!="[10]->nil" {
		t.Fail()
	}
}

func TestSimpleListeToString3(t *testing.T){
	var uneListe *List
	uneListe = Nil()
	uneListe.Append(10)
	uneListe.Append(20)
	if uneListe.ToString()!="[20]->[10]->nil" {
		t.Fail()
	}
}