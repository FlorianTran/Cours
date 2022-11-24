package DAO

import BD.SessionOracle
import Bean.employe
import oracle.jdbc.internal.OracleTypes
import java.sql.*

class DAOEmployeter(val ss: SessionOracle) {
    var session: SessionOracle? = null
    init {
        this.session=ss
    }

    fun read(){
        //var essai = SessionOracle();
        var conn: Connection? = null
        conn= session?.getConnectionOracle()
        try {
            val stmt : CallableStatement= conn!!.prepareCall("call lecture.liste_employes(?)");
            stmt.registerOutParameter(1, OracleTypes.CURSOR);
            stmt.execute();
            val result : ResultSet= stmt.getObject(1) as ResultSet;

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

    fun creer_employe(e : employe) {
        var conn: Connection? = null
        conn= session?.getConnectionOracle()
        val requete: String="call MAJ.creer_employe(?, ?, ?, ?, ?)"
        try {
            val stmt: CallableStatement = conn!!.prepareCall(requete)
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

    fun modifier_hebdo(e : employe) {
        var conn: Connection? = null
        conn= session?.getConnectionOracle()
        val requete: String="call MAJ.modifier_hebdo(?, ?)"
        try {
            val stmt: CallableStatement = conn!!.prepareCall(requete)
            stmt.setInt(1, e.getNuempl())
            stmt.setInt(2, e.getHebdo())
            stmt.executeUpdate()
        }
        catch(e: SQLException){
            println(e.errorCode)//numéro d'erreur
            println(e.message)// message d'erreur qui provient d'oracle, trigger ou procédure
        }
    }


}