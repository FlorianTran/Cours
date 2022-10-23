class Feuille() :Redimensionnable{
    private var hauteur : Int
    private var largeur : Int
    private var objetsContenus : Array<ObjetGraphique?>

    init{
        hauteur = 200
        largeur = 100
        objetsContenus = arrayOfNulls<ObjetGraphique?>(100)
    }
    fun inserer(nouvelObjet : ObjetGraphique) {
        for (i in objetsContenus.indices){
            if (objetsContenus[i] == null){
                objetsContenus[i] == nouvelObjet
                break
            }
        }
    }

    override fun redimensionner(nouvelleHauteur : Int, nouvelleLargeur : Int) {
        hauteur = nouvelleHauteur
        largeur = nouvelleLargeur
    }
}