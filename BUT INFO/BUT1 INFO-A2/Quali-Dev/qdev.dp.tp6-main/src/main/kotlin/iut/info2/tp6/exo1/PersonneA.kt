package iut.info2.tp6.exo1

/**
 * Classe englobant des Personnes ou des Entreprises
 *
 * @property nom le nom de la personne ou de l'entreprise
 */
open class PersonneA
protected constructor(protected open val nom: String) {

    companion object {

        /**
         * Méthode permettant de retourner une Personne ou une Entreprise à partir
         * de l'analyse d'une seule chaine de caractères qui doit respecter une
         * format précis
         *
         * @param texteSaisi le texte a analyser
         * @return une Personne ou une Entreprise
         * @throws PersonneException si le chaine [texteSaisi] le respecte pas l'un
         *     des formats attendus et donc, ne permet pas de créer une Personne ou
         *     une Entreprise
         */
        fun donnePersonneSaisie(texteSaisi: String): PersonneA {
            val txt = texteSaisi.split(" ")
            if (txt[0].isFullUpperCase()) {
                val catEntreprise = arrayListOf(
                    CategorieEntreprise.EURL,
                    CategorieEntreprise.SA,
                    CategorieEntreprise.SARL,
                    CategorieEntreprise.SCP
                )
                for (i in 0 until catEntreprise.size) {
                    if (!txt[1].isFullUpperCase() && txt[1].length == 1) throw PersonneException("Entreprise non valide")
                    if (txt[0] == catEntreprise[i].toString()) {
                        return Entreprise(txt[1], catEntreprise[i])
                    }
                }
                if (txt[1].hasAnUppercaseLetterFirst()) {
                    return Personne(txt[0],txt[1])
                }
                throw PersonneException("")
            }
            if (txt[0].hasAnUppercaseLetterFirst() || (txt[0].isFullUpperCase() && txt[1].hasAnUppercaseLetterFirst())) {
                return Personne(txt[1], txt[0])
            }
            throw PersonneException("")
        }
    }
}