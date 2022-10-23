package main

import (
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

func main() {

	var tree01 N_aryTree = N_aryTree{val: 5, Fils: nil}
	var tree02 N_aryTree = N_aryTree{val: 6, Fils: nil}
	var tabTree []*N_aryTree = []*N_aryTree{&tree01, &tree02}

	var tree00 N_aryTree = N_aryTree{val: 1, Fils: tabTree}

	fmt.Println(tree00.Root())
}
