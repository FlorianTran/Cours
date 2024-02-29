package MonApplication

import classes.Automate

class MonApplication(var suiteChar: String, var automate: Automate) {
    fun resolve(): String {
        var Ec = automate.Ei
        for (i in suiteChar) {
            if (Ec.transition[i] == null) {
                return "\u001b[31m" + "$suiteChar -> caractère non reconnu" + "\u001b[0m"
            } else {
                Ec = Ec.transition[i]!!
            }
        }
        if (Ec in automate.Ef) {
            return "$suiteChar " + "\u001B[32m" + "-> msg reconnu" + "\u001b[0m"
        }
        return "\u001b[31m" + "$suiteChar -> msg non reconnu" + "\u001b[0m"
    }
}