package iut.info2.tp6.exo2

class Entreprise(
    private val principal: Departement = Departement()
) : Salariable by principal, Ajoutable by principal