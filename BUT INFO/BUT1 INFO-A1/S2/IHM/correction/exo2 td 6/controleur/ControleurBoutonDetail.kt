package ihm.td6.exo2.controleur

import ihm.td6.exo2.modele.Cercle
import ihm.td6.exo2.vue.Vue
import javafx.event.ActionEvent
import javafx.event.EventHandler
import javafx.scene.control.Alert

class ControleurBoutonDetail(vue : Vue, modele : Cercle) : EventHandler<ActionEvent>{
     val vue : Vue
     val modele : Cercle

     init {
         this.vue = vue
         this.modele = modele
     }

    override fun handle(event: ActionEvent?) {
        val r = vue.cercle.radius
        val alert = Alert(Alert.AlertType.INFORMATION)
        alert.title = "Info sur le cercle :"
        alert.contentText = "Rayon : ${r}\nCouleur : ${vue.colorPicker.value}\nPerimete : ${modele.perimetre(r)}\nSurface : ${modele.surface(r)}"
        alert.showAndWait()
    }

}