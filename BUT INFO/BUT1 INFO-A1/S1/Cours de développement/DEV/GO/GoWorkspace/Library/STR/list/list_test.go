package list

import (
	"testing"
)

var elem00 Element = Element{val: 8, next: &elem01}
var elem01 Element = Element{val: 9, next: &elem02}
var elem02 Element = Element{val: 2, next: &elem03}
var elem03 Element = Element{val: 3, next: &elem04}
var elem04 Element = Element{val: 4, next: nil}

var list01 List = List{root: &elem00}
var list00 List = List{root: nil}

var list List = List{&elem00}
var tailList List = List{&elem01}
var appList List = List{&elem00}

func TestIsEmpty00(t *testing.T) {
	if list01.IsEmpty() != false {
		t.Fail()
	}
}

func TestIsEmpty01(t *testing.T) {
	if list00.IsEmpty() != true {
		t.Fail()
	}
}

func TestHead(t *testing.T) {
	x, err := list.Head()
	if err != nil {
		t.Fail()
	} else if x != list.root.val {
		t.Fail()
	}
}

func TestTail(t *testing.T) {
	x, err := list.Tail()

	res, _ := x.Head()
	res2, _ := tailList.Head()

	if err != nil {
		t.Fail()
	} else if res != res2 {
		t.Fail()
	}
}

func TestAppend(t *testing.T) {
	list01.Append(100)
	if list != appList {
		t.Fail()
	}
}
