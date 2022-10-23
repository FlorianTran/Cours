import kotlin.contracts.Returns

class Document(nomdeFichier : String) :Editable {
    private var nomDeFichier : String
    private var feuillesAssociees : Array<Feuille?>
    init {
        this.nomDeFichier = nomdeFichier
        feuillesAssociees = arrayOfNulls(10)
        feuillesAssociees[0] = Feuille()
    }

    override fun editer(nouveau: String) {
        nomDeFichier = nouveau
    }

    fun nouvelleFeuille() : Feuille? {
        for (i in feuillesAssociees.indices){
            if (feuillesAssociees[i] == null){
                feuillesAssociees[i] = Feuille()
                return  feuillesAssociees[i]
            }
        }
        return null
    }

    fun donneFeuille(position : Int) : Feuille?{
        if (position >= 0 && position <= 9) {
            return feuillesAssociees[position]
        }
        return null
    }
}