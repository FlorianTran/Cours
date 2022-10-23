package ihm.td4

import ihm.td4.ecouteurs.EcouteurChronoQ123
import javafx.application.Application
import javafx.geometry.Insets
import javafx.geometry.Pos
import javafx.scene.Scene
import javafx.scene.control.*
import javafx.scene.layout.BorderPane
import javafx.scene.layout.FlowPane
import javafx.scene.layout.VBox
import javafx.scene.paint.Color
import javafx.scene.text.Font
import javafx.scene.text.FontPosture
import javafx.scene.text.FontWeight
import javafx.stage.Stage


class AppliChronometreQ123: Application() {


    val boutonStop = Button("Stop")
    val boutonStart = Button("Start")
    val boutonReset = Button("Reset")
    val textField = TextField("")
    var timer: Timer?=null

    override fun start(primaryStage: Stage) {
        val root = BorderPane()
        val panelSup = FlowPane()
        val label=Label(" Mon Chronomètre")
        label.font = Font.font("Tahoma", FontWeight.BOLD, FontPosture.REGULAR, 20.0)
        label.textFill = Color.RED
        panelSup.children.add(label)
        panelSup.alignment=Pos.CENTER
        val ecouteur=EcouteurChronoQ123(this)
// instanciation du timer
        timer=Timer(1.0,ecouteur)

       panelSup.padding = Insets(10.0,10.0,10.0,10.0)
        val panelDroit = VBox()

        boutonStop.maxWidth=Double.MAX_VALUE
        boutonStop.onAction=ecouteur
        // Q3
       boutonStop.isDisable=true

        boutonStart.maxWidth=Double.MAX_VALUE
        boutonStart.onAction=ecouteur

        boutonReset.onAction=ecouteur
        boutonReset.maxWidth=Double.MAX_VALUE

        // Q3
       boutonReset.isDisable=true
        panelDroit.children.addAll(boutonStop, boutonStart, boutonReset)
        panelDroit.spacing = 5.0
        panelDroit.padding=Insets(0.0,10.0,10.0,10.0)
        textField.maxWidth= Double.MAX_VALUE
        textField.maxHeight= Double.MAX_VALUE
        textField.alignment= Pos.CENTER
        BorderPane.setMargin(textField,Insets(0.0,0.0,10.0,10.0))

        root.center = textField
        root.top = panelSup
        root.right = panelDroit


        val scene = Scene(root, 250.0, 150.0)
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
    Application.launch(AppliChronometreQ123::class.java)
}







