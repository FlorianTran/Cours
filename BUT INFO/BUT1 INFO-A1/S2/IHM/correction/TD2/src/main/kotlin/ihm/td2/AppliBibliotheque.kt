package ihm.td2


import javafx.application.Application
import javafx.geometry.Insets
import javafx.geometry.Pos
import javafx.scene.Scene
import javafx.scene.control.*
import javafx.scene.layout.*
import javafx.scene.text.Font
import javafx.scene.text.FontPosture
import javafx.scene.text.FontWeight
import javafx.stage.Stage


class AppliBibliotheque: Application() {


    override fun start(primaryStage: Stage) {

        val root=BorderPane()
        val btEfface=Button("-")
        root.top=btEfface
        BorderPane.setAlignment(btEfface, Pos.TOP_RIGHT)

        val panelConsultation = BorderPane()
        val titledPanelConsultation = TitledPane("Consultation des livres", panelConsultation)
        titledPanelConsultation.font= Font.font("sansserif", FontWeight.BOLD, FontPosture.REGULAR,12.0)
        titledPanelConsultation.isCollapsible = false
        titledPanelConsultation.maxHeight=Double.MAX_VALUE
        val livreSuivant= Button(">")
        livreSuivant.maxHeight=Double.MAX_VALUE
        val livrePrecedent= Button("<")
        livrePrecedent.maxHeight=Double.MAX_VALUE

        panelConsultation.right=livreSuivant
        panelConsultation.left=livrePrecedent
        livrePrecedent.isDisable=true

        val panelAfficheLivre = GridPane()
        BorderPane.setMargin(panelAfficheLivre, Insets(10.0))

        val afficheTitre=Label()
        afficheTitre.font= Font.font("sansserif", FontWeight.BOLD, FontPosture.REGULAR,20.0)
        panelAfficheLivre.vgap=10.0
        panelAfficheLivre.add(afficheTitre,0,0)
        val afficheCategorie=Label()
        afficheCategorie.font=Font.font("sansserif", FontWeight.NORMAL, FontPosture.REGULAR,16.0)
        panelAfficheLivre.add(afficheCategorie,0,1)
        val  afficheAuteur= Label()
        afficheAuteur.font=Font.font("sansserif", FontWeight.NORMAL, FontPosture.ITALIC,16.0)
        panelAfficheLivre.add(afficheAuteur,0,2)
        panelConsultation.center=panelAfficheLivre
        root.center=titledPanelConsultation

        val panelAjoutAuteur = BorderPane()
        val ajoutAuteur = Button("+")

        ajoutAuteur.maxWidth=Double.MAX_VALUE
        ajoutAuteur.maxHeight=Double.MAX_VALUE
        panelAjoutAuteur.right=ajoutAuteur


        val panelAuteur2 = GridPane()
        panelAuteur2.maxWidth= Double.MAX_VALUE
        panelAuteur2.add(Label("Nom :"),0,0)
        val zoneTexteNom = TextField()
        zoneTexteNom.prefColumnCount=40
        panelAuteur2.add(zoneTexteNom,0,1)
        panelAuteur2.add(Label("Prénom :"),0,2)

        val zoneTextePrenom = TextField()
        zoneTextePrenom.prefColumnCount=40
        panelAuteur2.add(zoneTextePrenom,0,3)
        panelAjoutAuteur.center=panelAuteur2

        val titledPanelAjoutAuteur = TitledPane("Ajout d'un auteur", panelAjoutAuteur)
        titledPanelAjoutAuteur.font= Font.font("sansserif", FontWeight.BOLD, FontPosture.REGULAR,12.0)
        titledPanelAjoutAuteur.isCollapsible = false

        val panelAjoutLivre = BorderPane()
        val ajoutLivre=Button("+")
        ajoutLivre.maxWidth=Double.MAX_VALUE
        ajoutLivre.maxHeight=Double.MAX_VALUE

        val choixCategories= ComboBox<String>()
        choixCategories.selectionModel.select(0)
        choixCategories.maxWidth=Double.MAX_VALUE
        choixCategories.maxHeight=Double.MAX_VALUE

        val choixAuteurs= ComboBox<String>()
        choixAuteurs.selectionModel.select(0)
        choixAuteurs.maxWidth=Double.MAX_VALUE
        choixAuteurs.maxHeight=Double.MAX_VALUE

        panelAjoutLivre.right=ajoutLivre
        val panelAjoutLivre2 = GridPane()

        panelAjoutLivre2.add(Label("Titre :"),0,0)
        val zoneTexteTitre= TextField()
        zoneTexteTitre.prefColumnCount=40
        panelAjoutLivre2.add(zoneTexteTitre,0,1)
        panelAjoutLivre2.add(choixCategories,0,2)
        panelAjoutLivre2.add(choixAuteurs,0,3)
        panelAjoutLivre.center=panelAjoutLivre2

        val titledPanelAjoutLivre = TitledPane("Ajout d'un livre", panelAjoutLivre)
        titledPanelAjoutLivre.font= Font.font("sansserif", FontWeight.BOLD, FontPosture.REGULAR,12.0)
        titledPanelAjoutLivre.isCollapsible = false

        val panelAjout=GridPane()
        panelAjout.add(titledPanelAjoutAuteur,0,0)
        panelAjout.add(titledPanelAjoutLivre,0,1)

        root.bottom=panelAjout

        val scene = Scene(root, 500.0, 500.0)
        primaryStage.setTitle("TD2 Bibliothèque en javaFX")
        primaryStage.setScene(scene)
        primaryStage.show()

    }

}

fun main() {
    Application.launch(AppliBibliotheque::class.java)
}