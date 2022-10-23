package particles

import "project-particles/config"

// Particle définit une particule.
type Particle struct {
	PositionX, PositionY            float64 // Position à l'écran
	Rotation                        float64 // Orientation
	ScaleX, ScaleY                  float64 // Taille
	ColorRed, ColorGreen, ColorBlue float64 // Couleur
	Opacity                         float64 // Transparence
	VelocityX, VelocityY            float64 // Vitesse
}

// newParticle est une fonction qui initialise une particule et la retourne.
func newParticle() Particle {
	var p Particle
	// Position
	if config.General.RandomSpawn {
		p.PositionX = getFloatInBounds(0, float64(config.General.WindowSizeX))
		p.PositionY = getFloatInBounds(0, float64(config.General.WindowSizeY))
	} else {
		p.PositionX = float64(config.General.SpawnX)
		p.PositionY = float64(config.General.SpawnY)
	}
	// Orientation
	p.Rotation = 0
	// Taille
	p.ScaleX = 1
	p.ScaleY = 1
	// Couleur
	p.ColorRed = 1
	p.ColorBlue = 1
	p.ColorGreen = 1
	// Transparence
	p.Opacity = 1
	// Vitesse
	p.VelocityX = getFloatInBounds(config.General.MinVelocityX, config.General.MaxVelocityX)
	p.VelocityY = getFloatInBounds(config.General.MinVelocityY, config.General.MaxVelocityY)
	return p
}

// Update met à jour l'état d'une particule à chaque fois qu'on l'appelle
func (p *Particle) update() {
	p.PositionX += p.VelocityX
	p.PositionY += p.VelocityY
}
