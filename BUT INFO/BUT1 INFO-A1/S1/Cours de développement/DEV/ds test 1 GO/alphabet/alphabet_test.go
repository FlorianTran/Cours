package alphabet

import "testing"

func TestVide(t *testing.T) {
	if alphabet("", "") {
		t.Error("Le mot vide n'est pas avant le mot vide dans l'ordre alphabétique")
	}
	if alphabet("bonjour", "") {
		t.Error("Le mot \"bonjour\" n'est pas avant le mot vide dans l'ordre alphabétique")
	}
	if !alphabet("", "bonjour") {
		t.Error("Le mot vide est avant le mot \"bonjour\" dans l'ordre alphabétique")
	}
}

func TestAvant(t *testing.T) {
	if !alphabet("bonjour", "bonsoir") {
		t.Error("Le mot \"bonjour\" est avant le mot \"bonsoir\" dans l'ordre alphabétique")
	}
}

func TestApres(t *testing.T) {
	if alphabet("bonsoir", "bonjour") {
		t.Error("Le mot \"bonsoir\" n'est pas avant le mot \"bonjour\" dans l'ordre alphabétique")
	}
}

func TestEgal(t *testing.T) {
	if alphabet("bonjour", "bonjour") {
		t.Error("Le mot \"bonjour\" n'est pas avant le mot \"bonjour\" dans l'ordre alphabétique")
	}
}
