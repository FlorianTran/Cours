package DAOStatement

import BD.SessionOracle
import Bean.Souhait
import Bean.Stage
import java.sql.Connection
import java.sql.*

class DAOSTAGE(val ss: SessionOracle) {
    var session: SessionOracle? = null
    init {
        this.session=ss
    }

    fun listes_des_souhait(numetudiant:Int):ArrayList<Souhait> {
        //var essai = SessionOracle();
        var conn: Connection? = null
        var list = arrayListOf<Souhait>()
        conn= session?.getConnectionOracle()
        val requete: String = "SELECT * FROM souhait"
        try {
            val stmt: Statement = conn!!.createStatement()// Création d'une requete de type Statemen
            val result: ResultSet= stmt.executeQuery(requete) //Le contenu du select est dans ResultSet

            /* Parcourir le résultat du select avec la fonction next();*/
            while (result!!.next()) {

                // getting the value of the id column
                val numetudiant = result.getInt("numetudiant")
                val numoffre=result.getInt("numoffre")
                val noment = result.getString("noment")
                list.add(Souhait(numetudiant,numoffre))
            }
            result.close()
        }
        catch(e: SQLException){
            e.printStackTrace()
        }
        return list
    }


    fun Ajout_souhait(Souhait: Souhait){
        val requete: String="INSERT INTO souhait values(${Souhait.getnumetudiant()}, '${Souhait.getnumoffre()}')"
        var conn: Connection? = null
        conn= session?.getConnectionOracle()

        try{
            val stmt: Statement = conn!!.createStatement()
            val result: Int= stmt.executeUpdate(requete)
        }
        catch(e: SQLException){
            print("${e.errorCode} : ${e.message}")
        }
    }


}