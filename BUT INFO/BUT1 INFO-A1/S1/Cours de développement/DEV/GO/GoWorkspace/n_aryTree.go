package main

import (
	"STR/tree"
	"errors"
	"fmt"
)

var ErrNoSuchElement error = errors.New("error no such element")

type N_aryTree struct {
	val  int
	Fils []*N_aryTree
}

func (t *N_aryTree) Root() (int, error) {
	if t.IsEmpty() {
		return 0, ErrNoSuchElement
	} else {
		return t.val, nil
	}
}

func (t *N_aryTree) IsEmpty() bool {
	return t == nil
}

func Make(v int, Fils []*N_aryTree) *N_aryTree {
	var newTree *N_aryTree = new(N_aryTree)
	newTree.val = v
	newTree.Fils = Fils
	return newTree
}

func main() {

	var tree122 N_aryTree = N_aryTree{val: 122, Fils: []*N_aryTree{}}
	var tree121 N_aryTree = N_aryTree{val: 121, Fils: []*N_aryTree{}}
	
	var tree12 N_aryTree = N_aryTree{val: 12, Fils: []*N_aryTree{&tree121, &tree122}}

	var tree1 N_aryTree = N_aryTree{val: 1, Fils: []*N_aryTree{&tree12}}

	fmt.Println(tree1.Root())
	fmt.Println(tree1.Fils[0].val)

	var tree0 N_aryTree = N_aryTree{val: 3, Fils: }
}
