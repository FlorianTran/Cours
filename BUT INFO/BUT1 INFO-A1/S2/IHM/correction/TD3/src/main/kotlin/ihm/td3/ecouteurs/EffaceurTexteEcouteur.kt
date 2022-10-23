package ihm.td3

import javafx.event.EventHandler
import javafx.scene.input.MouseEvent


class EffaceurTexteEcouteur(appli: Appli1): EventHandler<MouseEvent> {

    private val appli: Appli1

    init {
        this.appli = appli
    }


    override fun handle(e: MouseEvent) {
        if (e.clickCount == 2) {
            appli.zoneTexte.text=""
        }
    }

}
