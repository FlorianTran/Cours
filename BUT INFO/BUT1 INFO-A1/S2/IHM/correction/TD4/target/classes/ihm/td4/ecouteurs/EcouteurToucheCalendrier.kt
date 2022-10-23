
package ihm.td4.ecouteurs

import ihm.td4.AppliCalendrier
import javafx.event.EventHandler
import javafx.scene.input.KeyCode
import javafx.scene.input.KeyEvent
import java.util.*

class EcouteurToucheCalendrier(appli: AppliCalendrier):EventHandler<KeyEvent> {

    val appli: AppliCalendrier

    init {
        this.appli = appli
    }

    override fun handle(event: KeyEvent) {

        // gestion de l'appui sur la touche "left"
        if (event.code == KeyCode.LEFT) {
            // on change la date dans l'objet calendar => -1 jour
            appli.calendar.set(Calendar.DAY_OF_MONTH,appli.calendar[Calendar.DAY_OF_MONTH]-1)
            // on update la vue
            this.appli.update()

        }

        // gestion de l'appui sur la touche "left"
        if (event.code == KeyCode.RIGHT) {
            // on change la date dans l'objet calendar => +1 jour
            appli.calendar.set(Calendar.DAY_OF_MONTH,appli.calendar[Calendar.DAY_OF_MONTH]+1)
            // on update la vue
            this.appli.update()
        }

    }

}


