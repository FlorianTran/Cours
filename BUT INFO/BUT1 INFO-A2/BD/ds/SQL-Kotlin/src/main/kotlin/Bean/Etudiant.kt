package Bean

class Etudiant {
    private var numetudiant:Int = 0
    private var nometudiant:String = ""

    public fun setNumoffre(variable:Int){
        this.numetudiant=variable
    }
    public fun setNument(variable:String){
        this.nometudiant=variable
    }


    public fun getNumoffre():Int{
        return this.numetudiant
    }
    public fun getNument():String{
        return this.nometudiant
    }


    override fun toString():String{
        return ("Numéro offre : ${this.numetudiant}" +
                "Numéro entreprise : ${this.nometudiant}")
    }

}