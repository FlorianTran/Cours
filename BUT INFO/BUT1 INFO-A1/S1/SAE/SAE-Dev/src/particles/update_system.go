package particles

import (
	"log"
)

func (s *System) Update_system() {
	for i := 0; i < len(s.Content); i++ {
		s.Content[i].Update_particle()
		if s.Content[i].Opacity <= 0 {
			s.Content = append(s.Content[:i], s.Content[i+1:]...)
			log.Fatal(s.Content)
		}
	}
}