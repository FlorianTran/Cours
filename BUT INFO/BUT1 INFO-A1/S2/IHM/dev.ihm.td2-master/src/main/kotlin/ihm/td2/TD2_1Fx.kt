package ihm.td2

import javafx.application.Application
import javafx.geometry.Orientation
import javafx.geometry.Pos
import javafx.scene.Scene
import javafx.scene.control.Button
import javafx.scene.layout.*
import javafx.stage.Stage


class TD2_1Fx: Application() {

    override fun start(primaryStage: Stage) {

        val root = GridPane()
        val scene = Scene(root, 300.0, 300.0)

        val zoneNumbers = FlowPane(Orientation.VERTICAL)
        val zone2 = BorderPane()

        root.add(zoneNumbers,0,0)
        root.add(zone2,1,0)

        zoneNumbers.vgap = 5.0
        zoneNumbers.alignment = Pos.CENTER
        zoneNumbers.style = "-fx-background-color: pink"
        val column1 = ColumnConstraints()
        column1.percentWidth = 40.0
        val column2 = ColumnConstraints()
        column2.percentWidth = 60.0
        val row1 = RowConstraints()
        row1.percentHeight = 100.0

        root.columnConstraints.addAll(column1, column2)
        root.rowConstraints.add(row1)

        val btn1 = Button("1")
        val btn2 = Button("2")
        val btn3 = Button("3")
        val btn4 = Button("4")
        val btn5 = Button("5")
        val btn6 = Button("6")

        btn3.setPrefSize(100.0,100.0)

        val btnUp = Button("^")
        val btnLft = Button("<")
        val btnRgt = Button(">")
        val btnAct = Button("Activation")

        zone2.top = btnUp
        zone2.right = btnRgt
        zone2.left = btnLft
        zone2.center = btnAct

        btnUp.maxWidth = Double.MAX_VALUE
        btnRgt.maxHeight = Double.MAX_VALUE
        btnLft.maxHeight = Double.MAX_VALUE
        btnAct.maxWidth = Double.MAX_VALUE
        btnAct.maxHeight = Double.MAX_VALUE


        zoneNumbers.children.addAll(btn1,btn2,btn3,btn4,btn5,btn6)

        primaryStage.title="TP2_1 en javaFX"
        primaryStage.scene=scene
        primaryStage.show()
    }
}


fun main() {
    Application.launch(TD2_1Fx::class.java)
}

