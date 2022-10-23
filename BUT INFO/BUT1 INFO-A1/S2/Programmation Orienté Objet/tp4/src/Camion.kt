class Camion (mod : String, coul : String, places : Int) 
    : Vehicule(mod, coul, 90.0) {

    private val remorque : Array<Voiture?>
    private var placesOccupees : Int = 0

    init {
        remorque = arrayOfNulls<Voiture>(places)
    }
    
    override fun accelerer(acceleration : Double) : Double {
        if (estVide()) {
            return super.accelerer(acceleration)
        }
        return super.accelerer(acceleration / 2)
    }

    override fun decelerer(deceleration : Double) : Double {
        if (estVide()) {
            return super.decelerer(deceleration)
        }
        return super.decelerer(deceleration / 3)
    }

    fun estPlein() = (placesOccupees == remorque.size)

    fun estVide() = (placesOccupees == 0)
    
    fun charger(voitureTransportee : Voiture) : Boolean {
        if (estPlein())
            return false
        if (voitureTransportee.estEnMarche())
            return false
        if (voitureTransportee in remorque)
            return false
        remorque[placesOccupees] = voitureTransportee
        placesOccupees++
        return true
    }
    
    fun decharger() : Voiture? {
        if (estVide())
            return null
        placesOccupees--
        val aDecharger = remorque[placesOccupees]
        remorque[placesOccupees] = null
        return aDecharger
    }
}