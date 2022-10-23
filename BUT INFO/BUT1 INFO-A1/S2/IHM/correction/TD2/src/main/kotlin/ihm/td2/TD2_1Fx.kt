package ihm.td2

import javafx.application.Application
import javafx.geometry.Insets
import javafx.geometry.Orientation
import javafx.geometry.Pos
import javafx.scene.Scene
import javafx.scene.control.*
import javafx.scene.layout.*
import javafx.stage.Stage


class TD2_1Fx: Application() {

    override fun start(primaryStage: Stage) {
        // création de la grille principale
        val root = GridPane()
        val gauche= FlowPane()
        gauche.alignment=Pos.CENTER
        gauche.orientation=Orientation.VERTICAL
       //  rajout en Q1 b) pour le panneau gauche
        gauche.style="-fx-background-color: pink;"
        gauche.vgap=10.0
        gauche.padding=Insets(20.0)

        val b1=Button("1")
        val b2=Button("2")
        val b3=Button("3")
        //  rajout en Q1 b) pour modifier la taille du bouton
        b3.setPrefSize(75.0,75.0)
        val b4=Button("4")
        val b5=Button("5")
        val b6=Button("6")

        gauche.children.addAll(b1,b2,b3,b4,b5,b6)
        val droit = BorderPane()

        // création des boutons et mise en place des contrainte pour qu'ils remplissent le borderpane
        val up= Button("^")
        // rajout en Q1 b)  pour que bouton prenne toute la largeur dans le borderpane en top
        up.maxWidth=Double.MAX_VALUE

        droit.top=up
        val left=Button("<")
        // rajout en Q1 b)  pour que bouton prenne toute la hauteur dans le borderpane en left
        left.maxHeight=Double.MAX_VALUE
        droit.left=left
        val right=Button(">")
        // rajout en Q1 b)  pour que bouton prenne toute la hauteur dans le borderpane en right
       right.maxHeight=Double.MAX_VALUE
        droit.right=right
        val action=Button("Activation")
        // rajout en Q1 b)  pour que bouton prenne toute la hauteur et la largeur dans le borderpane en center
        action.maxWidth=Double.MAX_VALUE
        action.maxHeight=Double.MAX_VALUE
        droit.center=action

        // rajout en Q1 b) pour la gestion des contraintes sur les colonnes et la ligne
        // grille qui a deux colonnes 40% de la place + 60% de la place
        // la ligne prend 100% de la place
        // si pas celà la largeur et la hauteur des colonnes sont déterminés par le plus "gros" composants
       val column1 = ColumnConstraints()
        column1.percentWidth = 40.0
        val column2 = ColumnConstraints()
        column2.percentWidth = 60.0
        root.columnConstraints.addAll(column1, column2)
        val row=RowConstraints()
        row.percentHeight=100.0
        root.rowConstraints.add(row)

// ajout du flowpane et du borderpane à la grille
        root.add(gauche,0,0)
        root.add(droit,1,0)

        val scene = Scene(root, 300.0, 300.0)
        primaryStage.title="TP2_1B en javaFX"
        primaryStage.scene=scene
        primaryStage.show()
    }
}


fun main() {
    Application.launch(TD2_1Fx::class.java)
}

