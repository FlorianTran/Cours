package ihm.td4.ecouteurs

import ihm.td4.AppliCalendrier
import javafx.event.ActionEvent
import javafx.event.EventHandler
import java.util.*

class EcouteurComboBoxCalendrier(appli: AppliCalendrier) : EventHandler<ActionEvent> {

    private val appli: AppliCalendrier

    init {
        this.appli = appli
    }


    override fun handle(event: ActionEvent) {
        // on récupère l'itel sélectionné dans la ComboBox
        val index=appli.comboBox.selectionModel.selectedIndex
        // on change le mois de l'objet calendar
        this.appli.calendar.set(Calendar.MONTH,index)
        // on update la vue
        appli.update()
    }

}