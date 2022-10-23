package particles

import "math/rand"

// getFloatInBounds est une fonction qui retourne un nombre décimal compris
// entre min et max
func getFloatInBounds(min, max float64) float64 {
	return (max-min)*rand.Float64() + min
}
