package Bean

class employe(nuempl : Int, nomempl :String, hebdo : Int, affect : Int, salaire : Int) {
    private var nuempl : Int
    private var nomempl :String
    private var hebdo : Int
    private var affect : Int
    private var salaire : Int

    init {
        this.nuempl = nuempl
        this.nomempl = nomempl
        this.hebdo = hebdo
        this.affect = affect
        this.salaire = salaire
    }

    fun getNuempl(): Int {
        return this.nuempl
    }

    fun getNomempl(): String {
        return this.nomempl
    }

    fun getHebdo(): Int {
        return this.hebdo
    }

    fun getAffect(): Int {
        return this.affect
    }

    fun getSalaire(): Int {
        return this.salaire
    }

    fun setNuempl(new_num: Int) {
        this.nuempl = new_num
    }

    fun setNomempl(new_nom: String) {
        this.nomempl = new_nom
    }

    fun setHebdo(new_hebdo: Int) {
        this.hebdo = new_hebdo
    }

    fun setAffect(new_affect: Int) {
        this.affect = new_affect
    }

    fun setSalaire(new_salaire: Int) {
        this.salaire = new_salaire
    }

    override fun toString(): String {
        return "Employe(nuempl :"+this.nuempl+", nomempl :"+this.nomempl+", hebdo :"+this.hebdo+", affect : "+this.affect+", salaire : "+this.salaire
    }
}