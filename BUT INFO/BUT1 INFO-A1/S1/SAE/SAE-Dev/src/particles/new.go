package particles

import (
	"container/list"
	"math/rand"
	"project-particles/config"
	"time"
)

// NewSystem est une fonction qui initialise un système de particules et le
// retourne à la fonction principale du projet, qui se chargera de l'afficher.
// C'est à vous de développer cette fonction.
// Dans sa version actuelle, cette fonction affiche une particule blanche au
// centre de l'écran.

func NewSystem() System {
	rand.Seed(time.Now().UTC().UnixNano())
	var particles *list.List = list.New()
	if config.General.RandomSpawn == true {
		for i := 0; i < config.General.InitNumParticles; i++ {
			particles.Add(Particle{
				PositionX: float64(float64(config.General.WindowSizeX) * rand.Float64()), /*x nb rand de 0 à 1*/
				PositionY: float64(float64(config.General.WindowSizeY) * rand.Float64()),
				ScaleX:    1, ScaleY: 1,
				ColorRed: rand.Float64(), ColorGreen: rand.Float64(), ColorBlue: rand.Float64(),
				Opacity: 1,
			})
		}
	} else {
		for i := 0; i < len(particles); i++ {
			particles[i] = Particle{
				PositionX: float64(config.General.WindowSizeX),
				PositionY: float64(config.General.WindowSizeY),
				ScaleX:    1, ScaleY: 1,
				ColorRed: 1, ColorGreen: 1, ColorBlue: 1,
				Opacity: 1,
			}
		}
	}
	return System{Content: particles}
}

// PARTICULES AVEC TABLEAU
/* var particles []Particle
rand.Seed(time.Now().UTC().UnixNano())
particles = make([]Particle, config.General.InitNumParticles) //* à changer pour une liste doublement chainé réfléchir à comment on fait pour prevoir etc
if config.General.RandomSpawn == true {
	for i := 0; i < len(particles); i++ {
		particles[i] = Particle{
			PositionX: float64(float64(config.General.WindowSizeX) * rand.Float64()), /*x nb rand de 0 à 1
			PositionY: float64(float64(config.General.WindowSizeY) * rand.Float64()),
			ScaleX:    1, ScaleY: 1,
			ColorRed: rand.Float64(), ColorGreen: rand.Float64(), ColorBlue: rand.Float64(),
			Opacity: 1,
		}
	}
} else {
	for i := 0; i < len(particles); i++ {
		particles[i] = Particle{
			PositionX: float64(config.General.WindowSizeX),
			PositionY: float64(config.General.WindowSizeY),
			ScaleX:    1, ScaleY: 1,
			ColorRed: 1, ColorGreen: 1, ColorBlue: 1,
			Opacity: 1,
		}
	}
}
return System{Content: particles}
} */
