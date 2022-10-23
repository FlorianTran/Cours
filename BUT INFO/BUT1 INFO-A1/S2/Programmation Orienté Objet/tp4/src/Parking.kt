class Parking (raisonSociale : String, 
gerant : Personne, places : Int) : Entreprise (raisonSociale, "SA", gerant) {

    private val stationnement : Array<Voiture?> 

    init {
        stationnement = arrayOfNulls<Voiture>(places)
    }

    fun nombreDePlacesLibres() : Int {
        var compteur = 0
        for (place in stationnement) {
            if (place == null) compteur++
        }
        return compteur
    }
    
    fun nombreDePlacesTotales() = stationnement.size

    fun placeLibre(numeroPlace : Int) : Boolean {
        if (numeroPlace < 0 || numeroPlace >= stationnement.size)
            return false
        else 
            return stationnement[numeroPlace] == null
    }

    fun stationner(numeroPlace : Int, voitureStationnee : Voiture) : Boolean {
        if (!placeLibre(numeroPlace))
            return false
        if (voitureStationnee in stationnement)
            return false  
        stationnement.set(numeroPlace, voitureStationnee)
        return true
    }
}