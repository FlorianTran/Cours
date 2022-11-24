package Bean

class Souhait(numetudiant : Int,numoffre: Int) {
    private var numetudiant:Int = 0
    private var numoffre:Int = 0

    init {
        this.numetudiant = numetudiant
        this.numoffre = numoffre
    }

    public fun setnumetudiant(variable:Int){
        this.numetudiant=variable
    }
    public fun setNumoffre(variable:Int){
        this.numoffre=variable
    }


    public fun getnumetudiant():Int{
        return this.numetudiant
    }
    public fun getnumoffre():Int{
        return this.numoffre
    }


    override fun toString():String{
        return ("Numéro offre : ${this.numetudiant}" +
                "Numéro entreprise : ${this.numoffre}")
    }

}