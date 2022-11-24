package DAOStatement

import BD.SessionOracle
import Bean.Souhait
import Bean.Stage
import java.sql.Connection
import java.sql.*

class DAOSTAGETer(val ss: SessionOracle) {
    var session: SessionOracle? = null

    init {
        this.session = ss
    }

    fun listes_des_souhait(numetudiant:Int):ArrayList<Souhait> {
        //var essai = SessionOracle();
        var conn: Connection? = null
        var list = arrayListOf<Souhait>()
        conn= session?.getConnectionOracle()
        val requete: String = "call MAJ_LECTURE.liste_des_Souhaits(?)"
        try {
            var stmt: CallableStatement = conn!!.prepareCall(requete);
            stmt.setInt(1, Souhait.getnumetudiant())
            stmt.registerOutParameter(1, OracleTypes.CURSOR)
            stmt.execute();
            var res: ResultSet = stmt.getObject(1) as ResultSet
            while (res.next()) {
                val numetudiant = res.getString("numetudiant")
                println("$numetudiant $numoffre")
            }
            res.close()
        } catch (e: SQLException) {
            e.printStackTrace()
        }
        return list
    }


}