package ihm.td3.ecouteurs

import ihm.td3.Appli1
import javafx.event.ActionEvent
import javafx.event.EventHandler



class BoutonGoEcouteur(appli: Appli1) : EventHandler<ActionEvent> {
        private val appli: Appli1

        //--- Constructeur ---------------------------------
        init {
            this.appli=appli
        }

        //--- Code exécuté lorsque l'événement survient ----
       override  fun handle(event: ActionEvent) {
            var i = this.appli.labelNbClicBouton.text.toInt()
            i++
            this.appli.labelNbClicBouton.text = i.toString()
        }
    }
