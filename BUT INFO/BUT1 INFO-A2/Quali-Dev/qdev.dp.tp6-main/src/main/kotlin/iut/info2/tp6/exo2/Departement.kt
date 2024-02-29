package iut.info2.tp6.exo2

class Departement : Entite(), Ajoutable {
    val elements = mutableListOf<Entite>()
    override fun ajouter(entite: Entite) {
        elements.add(entite)
    }

    override fun supprimer(entite: Entite) {
        elements.remove(entite)
    }

    override fun salaire(): Double {
        var sum = 0.0
        elements.forEach {
            sum += it.salaire()
        }
        return sum
    }
}