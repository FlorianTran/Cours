package etudiant

type Etudiant struct {
	Nom    string
	Prenom string
	Notes  []float32
}

func (e Etudiant) Moyenne() float32 {
	var moy float32
	if len(e.Notes) == 0 {
		return moy
	}
	for i := 0; i < len(e.Notes); i++ {
		moy = moy + e.Notes[i]
	}
	moy = moy / float32(len((e.Notes)))
	return moy
}

func (e *Etudiant) AddNote(note float32) []float32 {
	e.Notes = append(e.Notes, note)
	return e.Notes
}

func (e Etudiant) Fusion() string {
	return " -" + e.Nom + " " + e.Prenom
}
