package tree

import (
	"testing"
)

func TestTreeVide(t *testing.T) {
	var bT *BinaryTree
	if !bT.IsEmpty() {
		t.Fail()
	}
}

func TestTree1(t *testing.T) {
	var bT *BinaryTree = Make(10, nil, nil)
	if bT.IsEmpty() {
		t.Fail()
	}
	valRoot, _ := bT.Root()
	if valRoot != 10 || bT.left != nil || bT.right != nil {
		t.Fail()
	}
}
