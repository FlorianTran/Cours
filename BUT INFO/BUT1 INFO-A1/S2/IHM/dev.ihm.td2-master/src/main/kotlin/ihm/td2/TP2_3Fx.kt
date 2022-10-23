package ihm.td2


import javafx.application.Application
import javafx.geometry.Insets
import javafx.geometry.Pos
import javafx.scene.Scene
import javafx.scene.control.*
import javafx.scene.layout.*
import javafx.stage.Stage


class TP2_3Fx: Application() {
    override fun start(primaryStage: Stage) {
        val root = BorderPane()
        val scene = Scene(root,600.0,800.0)
        val zone1 = TitledPane()

        zone1.text = "Consultation des livres"

        primaryStage.title="TP2_2 en javaFX"
        primaryStage.scene=scene
        primaryStage.show()

    }
}

fun main() {
    Application.launch(TP2_3Fx::class.java)
}