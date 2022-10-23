package ihm.td3.ecouteurs

import ihm.td3.Appli1
import javafx.event.ActionEvent
import javafx.event.EventHandler


class ChoixCouleurEcouteur(appli: Appli1) : EventHandler<ActionEvent>{

    private val appli: Appli1

    init{
        this.appli=appli
    }

    override fun handle(p0: ActionEvent) {

        val comboBox=appli.choixCouleur
        val couleur=comboBox.selectionModel.selectedItem
        var col=""
        when(couleur) {
            "Bleu" -> col = "blue"
            "Vert" -> col = "green"
            "Rouge" -> col = "red"
        }
        appli.panneauCouleurs.style="-fx-background-color: $col"
    }
}


