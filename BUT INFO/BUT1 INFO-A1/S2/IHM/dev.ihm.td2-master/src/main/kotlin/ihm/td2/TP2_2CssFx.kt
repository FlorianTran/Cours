package ihm.td2


import javafx.application.Application
import javafx.geometry.Insets
import javafx.geometry.Pos
import javafx.scene.Scene
import javafx.scene.control.*
import javafx.scene.layout.*
import javafx.stage.Stage


/*const val TEXTE= ("voici un texte relativement long à "
        + "lire et qui n'a aucune sorte d'intérêt à part"
        + " celui de prendre beaucoup de place et donc "
        + "d'occuper de l'espace dans la TextArea... ")
const val ADMINISTRATEUR = "Administrateur"
const val ETUDIANT = "Etudiant(e)"
const val ENSEIGNANT = "Enseignant(e)"
const val ETAT = "Etat de l'application > en cours d'identification"
*/

class TP2_2CssFx: Application() {

    override fun start(primaryStage: Stage) {
        // création du BorderPane principal

        val root = BorderPane()
        val scene = Scene(root, 600.0, 500.0)
        val zone2 = BorderPane()
        val zone3 = HBox()

        scene.stylesheets.add(TP2_2CssFx::class.java.getResource("css/style.css").toExternalForm())



        root.center = TextArea(TEXTE)
        (root.center as TextArea).isWrapText = true
        root.right = zone2
        root.bottom = zone3

        zone2.styleClass.add("my_style")

        primaryStage.title="TP2_2 en javaFX"
        primaryStage.scene=scene
        primaryStage.show()

        val label1 = Label(ETAT)
        val progress = ProgressBar()
        zone3.alignment = Pos.CENTER
        zone3.children.addAll(progress,label1)

        val zone2_1 = GridPane()
        val zone2_2 = GridPane()

        zone2.top = zone2_1
        zone2.bottom = zone2_2


        val label2 = Label("BIENVENUE")
        val label3 = Label("Login:")
        val label4 = Label("Password:")
        val login = TextField()
        val pswd = PasswordField()
        val btnEns = MenuButton(ETUDIANT)
        val item1 = MenuItem(ADMINISTRATEUR)
        val item2 = MenuItem(ETUDIANT)
        val item3 = MenuItem(ENSEIGNANT)
        btnEns.items.addAll(item1,item2,item3)
        val btnCo = Button("Connexion")

        zone2_1.vgap = 10.0

        zone2_1.add(label2,0,0)
        zone2_1.add(label3,0,1)
        zone2_1.add(btnEns,0,4)
        zone2_1.add(label4,0,2)
        zone2_1.add(login,1,1)
        zone2_1.add(pswd,1,2)
        zone2_1.add(btnCo,1,4)


        val label5 = Label("Choix formation")
        val label6 = Label("Choix Parcours")
        val chBox1 = CheckBox("Parcours 1")
        val chBox2 = CheckBox("Parcours 2")
        val chBox3 = CheckBox("Parcours 3")
        val chBoxRnd1 = RadioButton("info1")
        val chBoxRnd2 = RadioButton("info2")
        val chBoxRnd3 = RadioButton("info3")

        val group = ToggleGroup()

        chBoxRnd1.toggleGroup = group
        chBoxRnd1.isSelected = true
        chBoxRnd2.toggleGroup = group
        chBoxRnd2.isSelected = true
        chBoxRnd3.toggleGroup = group
        chBoxRnd3.isSelected = true

        zone2_2.add(label5,0,0)
        zone2_2.add(chBoxRnd1,0,1)
        zone2_2.add(chBoxRnd2,0,2)
        zone2_2.add(chBoxRnd3,0,3)
        zone2_2.add(label6,0,4)
        zone2_2.add(chBox1,0,5)
        zone2_2.add(chBox2,0,6)
        zone2_2.add(chBox3,0,7)

        zone2_1.padding = Insets(10.0)
        zone2_2.padding = Insets(10.0)

        btnEns.styleClass.add("custom-button")

        root.styleClass.add("root")
    }
}


fun main() {
    Application.launch(TP2_2CssFx::class.java)
}