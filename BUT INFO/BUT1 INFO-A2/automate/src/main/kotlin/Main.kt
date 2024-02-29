import MonApplication.MonApplication
import classes.Automate
import classes.Etat

fun main() {
    // Automate binaire 0 1
    var E0 = Etat("E0", hashMapOf())
    var E1 = Etat("E1", hashMapOf())
    // transition
    E0.addTransition(hashMapOf('1' to E1, '0' to E0))
    E1.addTransition(hashMapOf('1' to E1, '0' to E0))

    var automateBinaire = Automate(mutableListOf(E0, E1), mutableListOf('0', '1'), E0, mutableListOf(E1))
    var rep = MonApplication("1101", automateBinaire).resolve()

    rep = MonApplication("65489", automateBinaire).resolve()


    // Automate Smiley
    E0 = Etat("E0", hashMapOf())
    E1 = Etat("E1", hashMapOf())
    var E2 = Etat("E2", hashMapOf())
    var E3 = Etat("E3", hashMapOf())
    // Transition
    E0.addTransition(hashMapOf(':' to E1, ';' to E1, ']' to E1))
    E1.addTransition(hashMapOf('=' to E2, '-' to E2, '(' to E3, ')' to E3))
    E2.addTransition(hashMapOf('(' to E3, ')' to E3))

    var automateSmiley = Automate(
        mutableListOf(E0, E1, E2, E3), mutableListOf(':', ';', ']', '=', '-', '(', ')'), E0,
        mutableListOf(E3)
    )
    rep = MonApplication(":)", automateSmiley).resolve()

    rep = MonApplication(":-)", automateSmiley).resolve()

    rep = MonApplication(":qsdf)", automateSmiley).resolve()


    // Automate Horloge HH:MM
    E0 = Etat("E0", hashMapOf())
    var H1 = Etat("E0", hashMapOf())
    var H2 = Etat("E0", hashMapOf())
    var H = Etat("E0", hashMapOf())
    var M1 = Etat("E0", hashMapOf())
    var M2 = Etat("E0", hashMapOf())
    var M = Etat("E0", hashMapOf())
    // Transition
    E0.addTransition(hashMapOf('0' to H1, '1' to H1, '2' to H2))
    H1.addTransition(
        hashMapOf(
            '0' to H,
            '1' to H,
            '2' to H,
            '3' to H,
            '4' to H,
            '5' to H,
            '6' to H,
            '7' to H,
            '8' to H,
            '9' to H
        )
    )
    H2.addTransition(hashMapOf('0' to H, '1' to H, '2' to H, '3' to H))
    H.addTransition(hashMapOf(':' to M1))
    M1.addTransition(hashMapOf('0' to M2, '1' to M2, '2' to M2, '3' to M2, '4' to M2, '5' to M2))
    M2.addTransition(
        hashMapOf(
            '0' to M,
            '1' to M,
            '2' to M,
            '3' to M,
            '4' to M,
            '5' to M,
            '6' to M,
            '7' to M,
            '8' to M,
            '9' to M
        )
    )

    var automateHeure = Automate(
        mutableListOf(E0, E1, E2, E3), mutableListOf(':', '0', '1', '2', '3', '4', '5', '6', '7', '8', '9'), E0,
        mutableListOf(M)
    )

    rep = MonApplication("22:59", automateHeure).resolve()

    rep = MonApplication("25:29", automateHeure).resolve()

    rep = MonApplication("12:00", automateHeure).resolve()

//====================================================================================

    val menu = mutableListOf<String>("01: Binaire", "Smiley", "HH:MM")
    val menuAutomate = mutableListOf<Automate>(automateBinaire, automateSmiley, automateHeure)

    println("--------------- Menu de mon TP -------------------------")
    var y = 0
    for (i in menu) {
        y++
        println("$y: $i")
    }
    println(
        "-------------------------------------------------------\n" +
                "Selectioner une option: \"(1-$y)\""
    )

    var input = readLine()!!
    while ((input.toInt() - 1) > menuAutomate.size) {
        println("$input n'existe pas")
        println("Selectioner une nouvelle option qui existe: \"(1-$y)\"")
        input = readLine()!!
    }
    println(
        "-------------------------------------------------------\n" +
                "Vous avez selectionez ${menu[input.toInt() - 1]}\n" +
                "Alphabet disponible: ${menuAutomate[input.toInt() - 1].A}\n" + "Votre message:"
    )
    var input2 = readLine()!!
    println(MonApplication(input2, menuAutomate[input.toInt() - 1]).resolve())


}