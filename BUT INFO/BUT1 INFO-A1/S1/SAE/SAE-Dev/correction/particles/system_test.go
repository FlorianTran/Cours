package particles

import (
	"math"
	"math/rand"
	"project-particles/config"
	"testing"
)

// Vérification que NewSystem crée bien un système avec le nombre de particules
// initiales indiqué dans config.General.InitNumParticles
func TestNewSystemNumParticles(t *testing.T) {
	for i := 0; i < 100; i++ {
		config.General.InitNumParticles = rand.Intn(1000)
		if len(NewSystem().Content) != config.General.InitNumParticles {
			t.Fail()
		}
	}
	config.General.InitNumParticles = 0
	if len(NewSystem().Content) != 0 {
		t.Fail()
	}
}

// Vérification que Update ajoute bien le nombre de particules attendues par
// config.General.SpawnRate
func TestUpdateNumParticles(t *testing.T) {
	s := NewSystem()
	for i := 0; i < 100; i++ {
		config.General.SpawnRate = float64(rand.Intn(2)) + rand.Float64()
		numUpdate := rand.Intn(10)
		toSpawn := int(math.Floor(float64(numUpdate) * config.General.SpawnRate))
		initNum := len(s.Content)
		for j := 0; j < numUpdate; j++ {
			s.Update()
		}
		spawned := len(s.Content) - initNum
		if spawned != toSpawn {
			t.Fail()
		}
		s.NumToSpawn = 0
	}
}
