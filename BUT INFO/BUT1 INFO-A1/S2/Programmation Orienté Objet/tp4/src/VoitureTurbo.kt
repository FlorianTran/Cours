class VoitureTurbo (mod : String, coul : String, vitMax : Double) 
    : Voiture(mod, coul, vitMax) {

    private var turbo : Boolean = false

    fun changeTurbo(etat : Boolean) {
        turbo = etat
    }

    override fun accelerer(acceleration : Double) : Double {
        if (turbo)
            return super.accelerer(3 * acceleration)
        return super.accelerer(acceleration)
    }
}