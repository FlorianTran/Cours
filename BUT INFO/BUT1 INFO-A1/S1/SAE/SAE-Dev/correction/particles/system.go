package particles

import "project-particles/config"

// System définit un système de particules.
type System struct {
	Content    []Particle // Particules actuelles
	NumToSpawn float64    // Nombre de particules restant à ajouter
}

// NewSystem est une fonction qui initialise un système de particules et le
// retourne à la fonction principale du projet, qui se chargera de l'afficher.
func NewSystem() System {
	var s System
	for pNum := 0; pNum < config.General.InitNumParticles; pNum++ {
		s.addParticle()
	}
	return s
}

// addParticle est une méthode qui ajoute une particule à un système de
// particules.
func (s *System) addParticle() {
	s.Content = append(s.Content, newParticle())
}

// Update met à jour l'état du système de particules (c'est-à-dire l'état de
// chacune des particules) à chaque pas de temps. Elle est appellée exactement
// 60 fois par seconde (de manière régulière) par la fonction principale du
// projet.
func (s *System) Update() {
	for i := 0; i < len(s.Content); i++ {
		s.Content[i].update()
	}

	s.NumToSpawn += config.General.SpawnRate
	for s.NumToSpawn >= 1 {
		s.addParticle()
		s.NumToSpawn--
	}
}
