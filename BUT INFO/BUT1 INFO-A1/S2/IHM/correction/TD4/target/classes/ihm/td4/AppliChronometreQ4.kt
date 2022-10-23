package ihm.td4



import ihm.td4.ecouteurs.EcouteurChronoQ4
import javafx.application.Application
import javafx.geometry.Insets
import javafx.geometry.Pos
import javafx.scene.Scene
import javafx.scene.control.*
import javafx.scene.layout.BorderPane
import javafx.scene.layout.FlowPane
import javafx.scene.layout.VBox
import javafx.stage.Stage




class AppliChronometreQ4: Application() {

    val boutonStartStop = Button("Start")
    val boutonReset = Button("Reset")
    val radioButtonChrono = RadioButton("Chrono")
    val radioButtonTimer = RadioButton("Timer")
    val textField = TextField("0")
    var timer: Timer?=null



    override fun start(primaryStage: Stage) {

        val root = BorderPane()
        val panelSup = FlowPane()
        val boutonGroup=ToggleGroup()
        radioButtonChrono.isSelected=true
        radioButtonChrono.toggleGroup=boutonGroup
        radioButtonTimer.toggleGroup=boutonGroup
        panelSup.children.addAll(radioButtonChrono, radioButtonTimer)

        // instanciation de l'écouteur
        val ecouteur=EcouteurChronoQ4(this)
        // instanciation du timer
        this.timer=Timer(1.0,ecouteur)
        panelSup.hgap = 30.0
        panelSup.padding = Insets(10.0,10.0,10.0,10.0)
        val panelDroit = VBox()
        boutonStartStop.maxWidth=Double.MAX_VALUE
        boutonStartStop.onAction=ecouteur
        boutonReset.onAction=ecouteur
        boutonReset.maxWidth=Double.MAX_VALUE
        boutonReset.isDisable=true
        panelDroit.children.addAll(boutonStartStop, boutonReset)
        panelDroit.spacing = 5.0
        panelDroit.padding=Insets(0.0,10.0,10.0,10.0)
        root.top = panelSup
        root.right = panelDroit
        textField.maxWidth= Double.MAX_VALUE
        textField.maxHeight= Double.MAX_VALUE
        BorderPane.setMargin(textField,Insets(0.0,0.0,10.0,10.0))
        textField.alignment=Pos.CENTER
        root.center = textField
        val scene = Scene(root, 210.0, 140.0)
        primaryStage.setTitle("TD4 en javaFX")
        primaryStage.setScene(scene)
        primaryStage.show()
    }

    fun afficher(tempsSeconde: Long){
        val minutes = tempsSeconde / 60
        val seconde= tempsSeconde-minutes*60
        this.textField.text=String.format("%02d:%02d",minutes, seconde)

    }

}

fun main() {
    Application.launch(AppliChronometreQ4::class.java)
}




