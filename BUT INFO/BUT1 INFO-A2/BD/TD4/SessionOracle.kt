package BD

import java.sql.*
import java.util.*


class SessionOracle {

    var conn: Connection? = null
    var username: String = "i1a17a" // provide the username
    var password = "i1a17a" // provide the corresponding password
    var database="pdb1"  // le nom de la base


    /**
     * This method makes a connection to Oracle  Server
     */


    fun getConnectionOracle(): Connection? {
        val connectionProps = Properties()
        connectionProps.put("user", username)
        connectionProps.put("password", password)

        try {
            Class.forName("oracle.jdbc.driver.OracleDriver").newInstance()
            conn = DriverManager.getConnection("jdbc:oracle:thin:@172.26.82.68:1521:pdb1",username, password);
            println("connexion réussie")
        } catch (ex: SQLException) {
            // handle any errors
            ex.printStackTrace()
        } catch (ex: Exception) {
            // handle any errors
            ex.printStackTrace()
        }
        return conn
    }


}