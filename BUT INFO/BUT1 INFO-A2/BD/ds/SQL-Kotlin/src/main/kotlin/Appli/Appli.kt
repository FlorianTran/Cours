package Application

import BD.SessionOracle
import Bean.Souhait
import Bean.Stage
import DAOStatement.DAOSTAGE

fun main(args: Array<String>) {
    var essai= SessionOracle("i2c08a", "i2c08a");
    var dao=DAOSTAGE(essai)
    /*var daoBis=DAOSTAGEter(essai)*/
    dao.listes_des_souhait(1)
    dao.Ajout_souhait(Souhait(1,101))


    //TEST CONNEXION
    //essai.getConnectionOracle()

    //READ EMPLOYE
    //dao.read()

    //AJOUT EMPLOYE
    //dao.create(employé1)
    //dao.read()
    //daoBis.create(employé1)
    //dao.read()

    //DELETE EMPLOYE
    //dao.delete(employé1)
    //dao.read()
    //daoBis.delete(employé1)
    //dao.read()

    //UPDATE EMPLOYE
    //employé1.setNomempl("FREEZE")
    //dao.update(employé1)
    //dao.read()


}