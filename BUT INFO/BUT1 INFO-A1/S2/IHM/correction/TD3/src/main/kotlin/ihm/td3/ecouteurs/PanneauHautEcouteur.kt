package ihm.td3.ecouteurs

import ihm.td3.Appli1
import javafx.event.EventHandler
import javafx.scene.input.MouseEvent

class PanneauHautEcouteur(appli: Appli1): EventHandler<MouseEvent> {

    private val appli: Appli1

    init {
        this.appli = appli
    }


    override fun handle(e: MouseEvent) {

       if (e.eventType==MouseEvent.MOUSE_ENTERED){
           this.appli.panneauHaut.style="-fx-background-color:red"
        }
        if (e.eventType==MouseEvent.MOUSE_EXITED){
            this.appli.panneauHaut.style="-fx-background-color:lightgrey"

        }


    }

}