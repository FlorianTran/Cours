package DAO

import BD.SessionOracle
import Bean.employe
import java.sql.Connection
import java.sql.*

class DAOEmploye(val ss: SessionOracle) {
    var session: SessionOracle? = null
    init {
        this.session=ss
    }

    fun read(){
        //var essai = SessionOracle();
        var conn: Connection? = null
        conn= session?.getConnectionOracle()
        val requete: String="SELECT * FROM employe"
        try {
            val stmt: Statement = conn!!.createStatement()// Création d'une requete de type Statement
            val result: ResultSet= stmt.executeQuery(requete) //Le contenu du select est dans ResultSet

            /* Parcourir le résultat du select avec la fonction next();*/
            while (result!!.next()) {

                // getting the value of the id column
                val id = result.getInt("nuempl")
                val nom=result.getString("nomempl")
                println("$id $nom")

            }
            result.close()
        }

        catch(e: SQLException){
            println(e.errorCode)//numéro d'erreur
            println(e.message)// message d'erreur qui provient d'oracle, trigger ou procédure
        }
    }

    fun create(e : employe) {
        var conn: Connection? = null
        conn= session?.getConnectionOracle()
        val requete: String="INSERT INTO employe values (${e.getNuempl()}, '${e.getNomempl()}', ${e.getHebdo()}, ${e.getAffect()}, ${e.getSalaire()})"
        try {
            val stmt: Statement = conn!!.createStatement()// Création d'une requete de type Statement
            stmt.executeUpdate(requete)
        }
        catch(e: SQLException){
            println(e.errorCode)//numéro d'erreur
            println(e.message)// message d'erreur qui provient d'oracle, trigger ou procédure
        }
    }

    fun delete(e : employe) {
        var conn: Connection? = null
        conn= session?.getConnectionOracle()
        val requete: String="delete from employe where nuempl=${e.getNuempl()}"
        try {
            val stmt: Statement = conn!!.createStatement()// Création d'une requete de type Statement
            stmt.executeUpdate(requete)
        }
        catch(e: SQLException){
            println(e.errorCode)//numéro d'erreur
            println(e.message)// message d'erreur qui provient d'oracle, trigger ou procédure
        }
    }

    fun update(e : employe) {
        var conn: Connection? = null
        conn= session?.getConnectionOracle()
        val requete: String="update employe set nomempl='${e.getNomempl()}', hebdo=${e.getHebdo()}, affect=${e.getAffect()}, salaire=${e.getSalaire()} where nuempl=${e.getNuempl()}"
        try {
            val stmt: Statement = conn!!.createStatement()// Création d'une requete de type Statement
            stmt.executeUpdate(requete)
        }
        catch(e: SQLException){
            println(e.errorCode)//numéro d'erreur
            println(e.message)// message d'erreur qui provient d'oracle, trigger ou procédure
        }
    }

}