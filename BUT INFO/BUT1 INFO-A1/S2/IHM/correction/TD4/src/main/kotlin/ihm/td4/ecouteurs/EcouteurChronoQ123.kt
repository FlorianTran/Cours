package ihm.td4.ecouteurs

import ihm.td4.AppliChronometreQ123
import javafx.event.ActionEvent
import javafx.event.EventHandler


class EcouteurChronoQ123(appli: AppliChronometreQ123): EventHandler<ActionEvent> {

	private val appli: AppliChronometreQ123
	private var nombre: Long


	init {
		this.appli = appli
		this.nombre=0
	}

	//--- Code exécuté lorsque l'événement survient ----
	override  fun handle(e: ActionEvent) {

 // si on a cliqué sur stop
		if (e.source==appli.boutonStop){
			appli.timer?.stop()
			// pour Q3
			appli.boutonStop.isDisable=true
			appli.boutonReset.isDisable=false
			appli.boutonStart.isDisable=false
		}
// si on a cliqué sur start
		if (e.source==appli.boutonStart){

			// pour Q3
			appli.boutonStop.isDisable=false
			appli.boutonReset.isDisable=true
			appli.boutonStart.isDisable=true

			appli.timer?.start()
			this.nombre++
			appli.afficher(this.nombre)
		}

		// si on a cliqué sur reset
		if (e.source==appli.boutonReset){
			this.nombre=0
			// pour Q3
			appli.boutonStop.isDisable=true

			appli.afficher(this.nombre)
		}
 	// si c'est le timer qui envoie un événement
	 	if(e.source==appli.timer?.keyFrame){
			this.nombre++
			appli.afficher(this.nombre)
		}

	}

	
}

