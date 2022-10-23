package ihm.td3

import ihm.td3.ecouteurs.*
import javafx.application.Application
import javafx.geometry.Insets
import javafx.geometry.Pos
import javafx.scene.Scene
import javafx.scene.control.*
import javafx.scene.layout.BorderPane
import javafx.scene.layout.FlowPane
import javafx.scene.layout.Pane
import javafx.stage.Stage



class Appli1: Application() {

	val labelNbClicBouton:Label
	val labelNbClicPanneau: Label
	val panneauCouleurs: Pane
	val zoneTexte: TextField
	val textArea: TextArea
	val panneauHaut: FlowPane
	val panneauBas: FlowPane
	val choixCouleur: ComboBox<String>

	init{
		this.labelNbClicBouton=Label()
		this.labelNbClicPanneau=Label()
		this.panneauCouleurs = Pane()
		this.zoneTexte=TextField("")
		this.textArea=TextArea()
		this.panneauHaut= FlowPane()
		this.panneauBas= FlowPane()
		this.choixCouleur=ComboBox<String>()
	}

	override fun start(primaryStage: Stage) {
		panneauCouleurs.style = "-fx-background-color: blue;"
		val controleurPanel = ClicPanneauEcouteur(this)
		panneauCouleurs.setOnMouseClicked(controleurPanel)
		// ou couleurs.onMouseClicked=controleurPanel
		val couleurspossible = arrayOf("Bleu", "Vert", "Rouge")
		choixCouleur.items.addAll(couleurspossible)
		choixCouleur.selectionModel.select(1)
		val controleurCombobox = ChoixCouleurEcouteur(this)
		choixCouleur.setOnAction(controleurCombobox)

		val go = Button("go")

		val controleurBouton = BoutonGoEcouteur(this)
		// je détaille ici les différentes variantes
		//première manière
		// go.addEventHandler(ActionEvent.ACTION,controleurBouton)

		// seconde manière
		//go.setOnAction{controleurBouton} ou mieux
		go.setOnAction(controleurBouton)
		//ou  go.onAction=controleurBouton

		// même chose avec passage d'une fonction anonyme

		/*	go.addEventHandler(ActionEvent.ACTION,
			{
					var i: Int = nbClicBouton.text.toInt()
					i++
					nbClicBouton.text = i.toString()
			})

		*/


		/* c'est beau Kotlin !!!! encore plus concis

		go.setOnAction {
    var i: Int = nbClicBouton.text.toInt()
    i++
    nbClicBouton.text = i.toString()
}		*/

		zoneTexte.prefColumnCount = 15

		textArea.isWrapText = true
		textArea.isDisable = true
		textArea.prefRowCount = 10
		textArea.prefColumnCount = 10

		val textFieldHandler = RecopieurTexteEcouteur(this)
		zoneTexte.setOnKeyTyped(textFieldHandler)
		val effaceurTexte=EffaceurTexteEcouteur(this)
		zoneTexte.setOnMouseClicked(effaceurTexte)

		panneauHaut.onMouseEntered=PanneauHautEcouteur(this)
		panneauHaut.onMouseExited=PanneauHautEcouteur(this)
		panneauHaut.alignment = Pos.TOP_CENTER
		panneauHaut.hgap = 20.0
		panneauHaut.padding= Insets(10.0)
		panneauHaut.children.addAll(go,choixCouleur, zoneTexte)


		panneauBas.hgap = 10.0
		panneauBas.alignment = Pos.TOP_CENTER
		panneauBas.padding= Insets(10.0)
		labelNbClicBouton.text = "0"
		labelNbClicPanneau.text = "0"
		val cliquer = Label("Clics sur \"ok\" / zone de texte + Panneaux colorés = ")
		panneauBas.children.addAll(cliquer, labelNbClicBouton, labelNbClicPanneau)
        textArea.style="-fx-text-fill: black"
		val root = BorderPane()
		root.top = panneauHaut
		root.center = panneauCouleurs
		root.bottom = panneauBas
		root.left = textArea
		val scene = Scene(root, 500.0, 300.0)
		// Q9
		scene.onKeyPressed=EcouteurToucheControl(this)
		scene.onKeyReleased=EcouteurToucheControl(this)

		primaryStage.title="TD3 en javaFX exercice 1"
		primaryStage.scene=scene
		primaryStage.show()
	}

}

fun main() {
	Application.launch(Appli1::class.java)
}
