package ihm.td2


import javafx.application.Application
import javafx.geometry.HPos
import javafx.geometry.Insets
import javafx.geometry.Pos
import javafx.scene.Scene
import javafx.scene.control.*
import javafx.scene.layout.*
import javafx.scene.text.Font
import javafx.scene.text.FontPosture
import javafx.scene.text.FontWeight
import javafx.stage.Stage

const val TEXTE= ("voici un texte relativement long à "
        + "lire et qui n'a aucune sorte d'intérêt à part"
        + " celui de prendre beaucoup de place et donc "
        + "d'occuper de l'espace dans la TextArea... ")
const val ADMINISTRATEUR = "Administrateur"
const val ETUDIANT = "Etudiant(e)"
const val ENSEIGNANT = "Enseignant(e)"
const val ETAT = "Etat de l'application > en cours d'identification"


class TP2_2Fx: Application() {

    override fun start(primaryStage: Stage) {
        // création du BorderPane principal

        val root = BorderPane()
        val scene = Scene(root, 600.0, 500.0)
        val zoneDeTexte=TextArea()
        zoneDeTexte.prefRowCount=20
        zoneDeTexte.isWrapText=true
        zoneDeTexte.appendText(TEXTE)
        root.center=zoneDeTexte
        val panneauStatus= FlowPane()
        // pour le border en Q2 b)
        panneauStatus.style="-fx-border-color: lightgrey"
        panneauStatus.alignment=Pos.TOP_CENTER
        // horizontal gap entre les composants pour Q2 b)
        panneauStatus.hgap=10.0

        val pourcentStatus= ProgressBar()
        pourcentStatus.progress=0.6

        val zoneStatus= Label(ETAT)
        panneauStatus.children.addAll(pourcentStatus, zoneStatus)
        root.bottom=panneauStatus
        val panneauDroit=BorderPane()
        val gridFormulaire=GridPane()

        //padding + border + vgap de gridFormulaire pour Q2 b)
        gridFormulaire.padding=Insets(10.0)
        gridFormulaire.style="-fx-border-color: lightgrey"
        gridFormulaire.vgap=10.0

        val userName = Label("Login:")
        gridFormulaire.add(userName, 0, 1)
        val userTextField = TextField()
        gridFormulaire.add(userTextField, 1, 1)
        val pw = Label("Password:")
        gridFormulaire.add(pw, 0, 2)
        val pwBox = PasswordField()
        gridFormulaire.add(pwBox, 1, 2)
        val valeursEtat=arrayOf(ETUDIANT, ENSEIGNANT,ADMINISTRATEUR)
        val etat=ComboBox<String>()
        etat.getItems().addAll(valeursEtat)
        etat.selectionModel.select(0)
        gridFormulaire.add(etat,0,4)
        val formulaireTitle = Label("Bienvenue")

        // font pour pour formulaireTitle Q2 b)
        formulaireTitle.font= Font.font("sansserif",FontWeight.BOLD, FontPosture.ITALIC,20.0)

        gridFormulaire.add(formulaireTitle, 0, 0, 2, 1)

        val btnConnexion = Button("Connexion")
        gridFormulaire.add(btnConnexion,1,4)
        //marge + padding + alignment du btnConnexion pour Q2 b)
        //btnConnexion.padding=Insets(10.0)
        GridPane.setMargin(btnConnexion,Insets(20.0))
        GridPane.setHalignment(btnConnexion, HPos.RIGHT)

        val panneauFormation=VBox()
        //decalage dans la Vbox sur tous les côtés Q2 b)
        panneauFormation.padding= Insets(10.0)
        // distance entre les composants Q2 b)
        panneauFormation.spacing=10.0
        // mise en place d'une bordure Q2 b)
        panneauFormation.style="-fx-border-color: lightgrey"
        val group = ToggleGroup()
        val radioBouton1=RadioButton("info1")
        val radioBouton2=RadioButton("info2")
        val radioBouton3=RadioButton("info3")
        radioBouton1.toggleGroup=group
        radioBouton2.toggleGroup=group
        radioBouton3.toggleGroup=group
        val labelRadio=Label("Choix formation")
        // font pour labelRadio Q2 b)
        labelRadio.font= Font.font("sansserif", FontWeight.BOLD, FontPosture.ITALIC,16.0)
        panneauFormation.children.addAll(labelRadio,radioBouton1,radioBouton2,radioBouton3)

        val panneauParcours= GridPane()

        // vgap pour panneauParcours pour Q2 b)
        panneauParcours.vgap=10.0

        val parcours1= CheckBox("Parcours 1")
        parcours1.isSelected=true
        val parcours2=CheckBox("Parcours 2")
        val parcours3=CheckBox("Parcours 3")
        val labelParcours=Label("Choix Parcours")
        // font pour pour labelParcours Q2 b)
        labelParcours.font= Font.font("sansserif", FontWeight.BOLD, FontPosture.ITALIC,16.0)

// pour créer le Border de la grille avec la classe Border
        /*    val borderGrille = Border(
                BorderStroke(
                    Color.LIGHTGRAY,
                    BorderStrokeStyle.SOLID,
                    CornerRadii.EMPTY,
                    BorderWidths(1.0),
                    Insets(0.0)
                )
            )
         panneauOptions.border=borderGrille
*/

        // pour le border + le padding Q2 b) => cool en CSS  pour le border !!!
        panneauParcours.style="-fx-border-color: lightgray"
        panneauParcours.padding=Insets(10.0)

        panneauParcours.add(labelParcours,0,0)
        panneauParcours.add(parcours1,0,1)
        panneauParcours.add(parcours2,0,2)
        panneauParcours.add(parcours3,0,3)

        val panneauChoix=VBox()
        // pour gérer la position des 2 panneaux qu'il contient
        // ainsi on verra les border des 2 panneaux avec le décalage: Q2 b)
        panneauChoix.padding=Insets(10.0)
        panneauChoix.spacing=10.0

        panneauChoix.children.addAll(panneauFormation,panneauParcours)
        panneauDroit.bottom=panneauChoix
        panneauDroit.top=gridFormulaire

        root.right=panneauDroit

        primaryStage.title="TP2_2B en javaFX"
        primaryStage.scene=scene
        primaryStage.show()
    }
}


fun main() {
    Application.launch(TP2_2Fx::class.java)
}





