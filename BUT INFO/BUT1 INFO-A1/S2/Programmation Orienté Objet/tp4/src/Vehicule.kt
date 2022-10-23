open class Vehicule (mod : String, coul : String, vitMax : Double) : Propriete {

    private val modele : String
    private var couleur : String
    private var vitesseCourante : Double = 0.0
    private val vitesseMaximum : Double 
    private var enMarche : Boolean = false
    private var proprietaire : Proprietaire?
    private var conducteur : Personne?

    init {
        modele = mod
        couleur = coul
        vitesseMaximum = vitMax
        proprietaire = null
        conducteur = null
    }

    fun devientConducteur(personne : Personne) {
        conducteur = personne
    }

    fun plusDeConducteur() {
        conducteur = null
        arreter()
    }

    fun demarrer() {
        if (conducteur != null)
        enMarche = true
    }

    fun arreter() {
        enMarche = false
        vitesseCourante = 0.0
    }

    fun estEnMarche() = enMarche

    fun repeindre(nouvelleCouleur : String) {
        if (!enMarche)
            couleur = nouvelleCouleur
    }

    open fun accelerer(acceleration : Double) : Double {
        if (acceleration > 0.0) {
            if (enMarche) {
                if (vitesseCourante + acceleration < vitesseMaximum) {
                    vitesseCourante += acceleration
                }
                else {
                    vitesseCourante = vitesseMaximum
                }
            }
        }
        return vitesseCourante
    }

    open fun decelerer(deceleration : Double) : Double {
        if (deceleration > 0.0) {
            if (enMarche) {
                if (vitesseCourante - deceleration > 0.0) {
                    vitesseCourante -= deceleration
                }
                else {
                    vitesseCourante = 0.0
                }
            }
        }
        return vitesseCourante
    }

    override fun acheter(acheteur : Proprietaire) {
        proprietaire = acheteur
    }

    fun afficher() {
        print("Vehicule $modele de couleur $couleur")
        if (proprietaire != null) {
            val nom = proprietaire!!.donneNomComplet()
            print(", propriété de $nom,")
        }
        if (enMarche)
            println(" roule à $vitesseCourante / $vitesseMaximum")
        else
            println(" est à l'arrêt")
    }
}