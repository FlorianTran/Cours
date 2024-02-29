package classes

class Etat(var nomE: String, var transition: HashMap<Char, Etat>) {
    fun addTransition(action: HashMap<Char,Etat>) {
        transition = action
    }
}