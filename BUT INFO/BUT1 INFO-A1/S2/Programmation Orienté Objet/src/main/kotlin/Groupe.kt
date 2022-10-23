class Groupe (objet1 : ObjetGraphique, objet2 : ObjetGraphique) : ObjetGraphique(){

    private var objetsRegroupes : Array<ObjetGraphique?> = arrayOfNulls(10)

    init {
        objetsRegroupes[0] = objet1
        objetsRegroupes[1] = objet2
    }
    override fun selectionner(ok: Boolean) {
        for (objet in objetsRegroupes) {
            objet?.selectionner(ok)
        }
    }
    fun regrouper(objetAjoute : ObjetGraphique) {
        for (i in objetsRegroupes.indices){
            if (objetsRegroupes[i] == null){
                objetsRegroupes[i] == objetAjoute
                break
            }
        }
    }
}