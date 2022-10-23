package ihm.td4.ecouteurs


import ihm.td4.AppliChronometreQ4
import javafx.event.ActionEvent
import javafx.event.EventHandler



class EcouteurChronoQ4(appli: AppliChronometreQ4): EventHandler<ActionEvent> {

        private val appli: AppliChronometreQ4
        private var nombre: Long
        private var appliChrono: Boolean
        private var estDemarrer: Boolean

        init {
                this.appli = appli
                this.appliChrono=true
                this.estDemarrer=false
                this.nombre=0
        }

        //--- Code exécuté lorsque l'événement survient ----
        override  fun handle(e: ActionEvent) {

// si l'application n'a pas encoré été démarrée,
                if (!estDemarrer) {
                        if (appli.radioButtonChrono.isSelected == true) {
                                this.appliChrono = true
                        }
                        else {
                                this.appliChrono = false
                                // on lit le temps du minuteur exprimé en seconde
                                //peut mieux faire car plante quand pas bon format, cad long mais bon !!!!
                                this.nombre = appli.textField.text.toLong()
                        }
                }
                // si application déjà démarrée
                else {
                        // cas application chronomètre
                        if (appliChrono) {
                                // à  chaque événement généré par le timer, on ajoute 1 s au temps global et on l'affiche sur l'IHM
                                if (e.source == appli.timer?.keyFrame) {
                                        this.nombre++
                                        appli.afficher(this.nombre)
                                }
                        } else {// cas application minuteur
                                // à  chaque événement généré par le timer, on retranche 1 s au temps global et on l'affiche sur l'IHM
                                if (e.source == appli.timer?.keyFrame) {
                                        this.nombre--
                                        if (this.nombre >= 0) {
                                                appli.afficher(this.nombre)
                                        } else {// cas où le temps est écoulé
                                                appli.timer?.stop()
                                        }
                                }
                        }
                }
                // gestion du bouton Start/Stop
                if (e.source == appli.boutonStartStop) {
                        if (appli.boutonStartStop.text == "Start") {
                                this.estDemarrer=true
                                appli.timer?.start()
                                appli.boutonStartStop.text = "Stop"
                                appli.boutonReset.isDisable = true
                        } else {
                                appli.timer?.stop()
                                this.estDemarrer=false
                                appli.boutonStartStop.text = "Start"
                                appli.boutonReset.isDisable = false
                        }
                }

                // gestion du bouton reset
                if (e.source == appli.boutonReset) {
                        this.nombre = 0
                        appli.afficher(this.nombre)
                }
        }
}















