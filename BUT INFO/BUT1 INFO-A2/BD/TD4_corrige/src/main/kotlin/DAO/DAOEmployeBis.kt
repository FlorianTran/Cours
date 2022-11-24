package DAO

import BD.SessionOracle
import Bean.employe
import java.sql.Connection
import java.sql.*

class DAOEmployeBis(val ss: SessionOracle) {
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
        val requete: String="INSERT INTO employe values (?, ?, ?, ?, ?)"
        try {
            val stmt: PreparedStatement = conn!!.prepareStatement(requete)// Création d'une requete de type Statement
            stmt.setInt(1, e.getNuempl())
            stmt.setString(2, e.getNomempl())
            stmt.setInt(3, e.getHebdo())
            stmt.setInt(4, e.getAffect())
            stmt.setInt(5, e.getSalaire())
            stmt.executeUpdate()
        }
        catch(e: SQLException){
            println(e.errorCode)//numéro d'erreur
            println(e.message)// message d'erreur qui provient d'oracle, trigger ou procédure
        }
    }

    fun delete(e : employe) {
        var conn: Connection? = null
        conn= session?.getConnectionOracle()
        val requete: String="delete from employe where nuempl=?}"
        try {
            val stmt: PreparedStatement = conn!!.prepareStatement(requete)// Création d'une requete de type Statement
            stmt.setInt(1, e.getNuempl())
            stmt.executeUpdate()
        }
        catch(e: SQLException){
            println(e.errorCode)//numéro d'erreur
            println(e.message)// message d'erreur qui provient d'oracle, trigger ou procédure
        }
    }

    fun update(e : employe) {
        var conn: Connection? = null
        conn= session?.getConnectionOracle()
        val requete: String="update employe set nomempl=?, hebdo=?, affect=?, salaire=? where nuempl=?"
        try {
            val stmt: PreparedStatement = conn!!.prepareStatement(requete)// Création d'une requete de type Statement
            stmt.setString(1, e.getNomempl())
            stmt.setInt(2, e.getHebdo())
            stmt.setInt(3, e.getAffect())
            stmt.setInt(4, e.getSalaire())
            stmt.setInt(5, e.getNuempl())
            stmt.executeUpdate()
        }
        catch(e: SQLException){
            println(e.errorCode)//numéro d'erreur
            println(e.message)// message d'erreur qui provient d'oracle, trigger ou procédure
        }
    }

}