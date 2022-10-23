package ihm.td3.ecouteurs


import ihm.td3.Appli1
import javafx.event.EventHandler
import javafx.scene.control.Alert
import javafx.scene.control.Alert.AlertType
import javafx.scene.input.KeyEvent


class RecopieurTexteEcouteur(appli: Appli1):EventHandler<KeyEvent> {

        private val appli: Appli1

        init{
            this.appli=appli
        }

        override fun handle(p0: KeyEvent) {


                println("recopieur")
                val c = p0.character
                if (c == "$") {
                        val dialog = Alert(AlertType.ERROR)
                        dialog.setTitle("An error dialog-box")
                        dialog.setHeaderText(null)
                        dialog.setContentText("Erreur !!!!!")
                        dialog.showAndWait()
                } else {
                        this.appli.textArea.text += c
                }
        }

}