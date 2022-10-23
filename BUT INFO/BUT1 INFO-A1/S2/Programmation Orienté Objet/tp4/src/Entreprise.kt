open class Entreprise (raisonSociale : String, forme : String = "SCOP", gerant : Personne) 
    : Proprietaire, Propriete {

    private val raisonSociale : String
    private val forme : String  // SA, EURL, SCOP // défaut SCOP
    private var gerant : Proprietaire

    init {
            this.raisonSociale = raisonSociale
            this.forme = if (forme == "SA" || forme == "EURL" || forme == "SCOP")
                            forme
                        else "SCOP"
            this.gerant = gerant
    }

    fun donneForme() : String {
        return forme
    }

    fun donneGerantActuel() : Proprietaire {
         return gerant 
    }

    override fun donneNomComplet() : String {
        return raisonSociale + " " + forme
    }

    override fun acheter(acheteur : Proprietaire) {
        gerant = acheteur
    }
}