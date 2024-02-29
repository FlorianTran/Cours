package iut.info2.tp6.exo1

/**
 * méthode indiquant si la chaine de caractère est uniquement composée de
 * lettres en majuscules
 *
 * @return [true] si la chaine est en majuscule
 */
fun String.isFullUpperCase(): Boolean {
    if (!this.all {c: Char -> c.isLetter()}) return false
    if(this == "") return false
    return this.uppercase()==this
}

/**
 * Méthode indiquant si la chaine de caractères est composée d'un premier
 * caractère en majuscule, suivi des autres caractères en minuscules
 *
 * @return [true] si la chaine respecte le format
 */
fun String.hasAnUppercaseLetterFirst(): Boolean {
    if (!this.all {c: Char -> c.isLetter()}) return false
    val char = this.uppercase()
    val charMin = this.lowercase()
    if (this[0] == char[0]) {
        if(this.length==1) return true
        for(i in 1 until this.length){
            if (this[i] != charMin[i]) {
                return false
            }
        }
        return true
    }
    return false
}

