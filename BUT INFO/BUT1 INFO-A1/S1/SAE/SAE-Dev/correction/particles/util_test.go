package particles

import (
	"math/rand"
	"testing"
)

// Vérification que les flotants fournis par getFloatInBounds sont bien
// dans l'interval demandé
func TestGetFloatInBoundsRange(t *testing.T) {
	for i := 0; i < 100; i++ {
		min := float64(rand.Intn(20))*rand.Float64() - 10
		max := float64(rand.Intn(20))*rand.Float64() - 10
		if min > max {
			min, max = max, min
		}
		getFloat := getFloatInBounds(min, max)
		if getFloat < min || getFloat > max {
			t.Fail()
		}
	}
}

// Vérification que tout se passe bien dans quelques cas particuliers
func TestGetFloatInBoundsRangeSpecial(t *testing.T) {
	if getFloatInBounds(0, 0) != 0 {
		t.Fail()
	}
}
