package particles

import (
	"math"
	"math/rand"
	"project-particles/config"
	"testing"
)

// Vérification que les particules générées quand config.General.RandomSpawn
// vaut true sont bien toutes à l'intérieur de l'écran
func TestNewParticleInScreen(t *testing.T) {
	config.General.RandomSpawn = true
	for i := 0; i < 100; i++ {
		config.General.WindowSizeX = rand.Intn(600) + 200
		config.General.WindowSizeY = rand.Intn(600) + 400
		p := newParticle()
		if p.PositionX < 0 || p.PositionX > float64(config.General.WindowSizeX) ||
			p.PositionY < 0 || p.PositionY > float64(config.General.WindowSizeY) {
			t.Fail()
		}
	}
}

// Vérification que les particules générées quand config.General.RandomSpawn
// vaut false sont bien toutes à la position demandée, c'est-à-dire aux
// coordonnées (config.General.SpawnX, config.General.SpawnY)
func TestNewParticleAtSpawnPoint(t *testing.T) {
	config.General.RandomSpawn = false
	p := newParticle()
	if int(math.Round(p.PositionX)) != config.General.SpawnX ||
		int(math.Round(p.PositionY)) != config.General.SpawnY {
		t.Fail()
	}
}

// Vérification que la fonction update met bien à jour la position des particules
// sur lesquelles on l'utilise
func TestParticleUpdate(t *testing.T) {
	for i := 0; i < 100; i++ {
		p := newParticle()
		goalX := p.PositionX + p.VelocityX
		goalY := p.PositionY + p.VelocityY
		p.update()
		if p.PositionX != goalX || p.PositionY != goalY {
			t.Fail()
		}
	}
}
