package Application

import BD.SessionOracle
import Bean.employe
import DAO.DAOEmploye
import DAO.DAOEmployeBis
import DAO.DAOEmployeter

fun main(args: Array<String>) {
    val essai= SessionOracle("i2c07b", "i2c07b");

    var dd= DAOEmployeter(essai)
    var e = employe(8756,"CHEZOIM", 35,5,2000)
    dd.read()
    //dd.creer_employe(e)
    //e.setHebdo(20)
    //dd.modifier_hebdo(e)
    //dd.delete(e)
    //e.setNomempl("frixyo")
    //dd.update(e)
    //dd.read()
}