package Bean

class Stage {
    private var numoffre:Int = 0
    private var nument:Int = 0
    private var libelle:String = ""
    private var remuneration:Int = 0

    public fun setNumoffre(variable:Int){
        this.numoffre=variable
    }
    public fun setNument(variable:Int){
        this.nument=variable
    }
    public fun setLibelle(variable:String){
        this.libelle=variable
    }
    public fun setRemuneration(variable:Int){
        this.remuneration=variable
    }
    public fun getNumoffre():Int{
        return this.numoffre
    }
    public fun getNument():Int{
        return this.nument
    }
    public fun getLibelle():String{
        return this.libelle
    }
    public fun getRemuneration():Int{
        return this.remuneration
    }

    override fun toString():String{
        return ("Numéro offre : ${this.numoffre}" +
                "Numéro entreprise : ${this.nument}" +
                "Libelle : ${this.libelle}" +
                "Salaire : ${this.remuneration}")
    }

}