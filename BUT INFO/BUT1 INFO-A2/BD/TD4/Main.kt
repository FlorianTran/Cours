package Application

import BD.SessionOracle
import DAOStatement.DAOEmploye

fun main(args: Array<String>) {
    var essai= SessionOracle();

    essai.getConnectionOracle()

    var dd=DAOEmploye(essai)
    dd.read()


}