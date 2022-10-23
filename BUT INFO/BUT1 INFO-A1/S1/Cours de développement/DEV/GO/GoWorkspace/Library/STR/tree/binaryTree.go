package tree

import (
	"errors"
	"fmt"
)

var ErrNoSuchElement error = errors.New("error no such element")

type BinaryTree struct {
	val   int
	left  *BinaryTree
	right *BinaryTree
	//Fils []*BinaryTree
}

func (t *BinaryTree) Root() (int, error) {
	if t.IsEmpty() {
		return 0, ErrNoSuchElement
	} else {
		return t.val, nil
	}
}

func (t *BinaryTree) Left() (*BinaryTree, error) {
	if t.IsEmpty() {
		return nil, ErrNoSuchElement
	} else {
		return t.left, nil
	}
}

func (t *BinaryTree) Right() (*BinaryTree, error) {
	if t.IsEmpty() {
		return nil, ErrNoSuchElement
	} else {
		return t.right, nil
	}
}

func Make(v int, A1 *BinaryTree, A2 *BinaryTree) *BinaryTree {
	var newTree *BinaryTree = new(BinaryTree)
	newTree.val = v
	newTree.left = A1
	newTree.right = A2
	return newTree
}

func (t *BinaryTree) IsEmpty() bool {
	return t == nil
}

func Nil() *BinaryTree {
	return Make(0, nil, nil)
}

func (t BinaryTree) Prefix() {
	fmt.Println(t)
	if !t.left.IsEmpty() {
		t.left.Prefix()
	}
	if !t.right.IsEmpty() {
		t.right.Prefix()
	}
}
