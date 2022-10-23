package ihm.td3.ecouteurs


import ihm.td3.Appli1
import javafx.event.EventHandler
import javafx.scene.input.MouseEvent


class ClicPanneauEcouteur(appli: Appli1) : EventHandler<MouseEvent> {
    private val appli: Appli1

    init{
        this.appli=appli
    }

    override fun handle(p0: MouseEvent) {
        if (p0.getClickCount() == 1) {
            var i: Int = this.appli.labelNbClicPanneau.text.toInt()
            i++
            this.appli.labelNbClicPanneau.text = i.toString()
        }
    }

}