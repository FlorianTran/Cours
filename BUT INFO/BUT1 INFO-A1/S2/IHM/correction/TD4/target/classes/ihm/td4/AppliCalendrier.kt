package ihm.td4

import ihm.td4.ecouteurs.EcouteurComboBoxCalendrier
import ihm.td4.ecouteurs.EcouteurToucheCalendrier
import javafx.application.Application
import javafx.geometry.Insets
import javafx.scene.Scene
import javafx.scene.control.ComboBox
import javafx.scene.control.Label
import javafx.scene.layout.FlowPane
import javafx.stage.Stage
import java.util.*

class AppliCalendrier : Application() {
    val comboBox= ComboBox<String>()
    val labelnumeroJour= Label("")
    val labelJour=Label("")
    val labelYear=Label("")
    val calendar = Calendar.getInstance()

    override fun start(primaryStage: Stage) {
        val root= FlowPane()
        val tabMonth= arrayOf(
            "janvier",
            "février",
            "mars",
            "avril",
            "mai",
            "juin",
            "juillet",
            "août",
            "septembre",
            "octobre",
            "novembre",
            "décembre"
        )
        this.comboBox.items.addAll(tabMonth)
        this.comboBox.onAction=EcouteurComboBoxCalendrier(this)

        root.children.addAll(labelJour,labelnumeroJour, comboBox, labelYear)
        root.hgap=10.0
        root.padding= Insets(20.0)
        this.update()

        val scene = Scene(root, 400.0, 70.0)
        scene.onKeyPressed=EcouteurToucheCalendrier(this)

        primaryStage.setTitle("Calendrier en javaFX")
        primaryStage.setScene(scene)
        primaryStage.show()
    }
// pour mettre à jour les composants graphiques de la vue quand une modification du calendrier a eu lieu
    fun update(){
        val tabDay= arrayOf("dimanche", "lundi", "mardi", "mercredi", "jeudi", "vendredi", "samedi")
        val dayOfWeek = calendar[Calendar.DAY_OF_WEEK] // commence à 1
        val date = calendar[Calendar.DAY_OF_MONTH]
        val month = calendar[Calendar.MONTH] //commence à 0
        val year = calendar[Calendar.YEAR]
        this.comboBox.selectionModel.select(month)
        labelnumeroJour.text=date.toString()
        labelJour.text=tabDay[dayOfWeek-1]
        labelYear.text=year.toString()
    }
}

fun main() {
    Application.launch(AppliCalendrier::class.java)
}