package ihm.td3.ecouteurs

import ihm.td3.Appli1
import javafx.event.EventHandler
import javafx.scene.input.KeyCode
import javafx.scene.input.KeyEvent

class EcouteurToucheControl (appli: Appli1): EventHandler<KeyEvent> {

    private val appli: Appli1

    init{
        this.appli=appli
    }

    override fun handle(p0: KeyEvent) {


        if ((p0.eventType==KeyEvent.KEY_PRESSED) && (p0.code== KeyCode.CONTROL)){

            appli.panneauBas.style="-fx-background-color: pink"

        }

        if ((p0.eventType==KeyEvent.KEY_RELEASED) && (p0.code== KeyCode.CONTROL)){

            appli.panneauBas.style="-fx-background-color: white"

        }



    }
}