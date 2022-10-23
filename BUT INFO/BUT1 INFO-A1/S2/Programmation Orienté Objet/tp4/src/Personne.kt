class Personne (nom : String, prenom : String) : Proprietaire {

    private var nom : String
    private var prenom : String

    init {
        this.nom = nom
        this.prenom = prenom
    }

    override fun donneNomComplet() : String {
        return prenom + " " + nom.uppercase()
    }
}