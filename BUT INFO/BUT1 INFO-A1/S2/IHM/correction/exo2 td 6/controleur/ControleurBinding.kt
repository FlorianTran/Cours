package ihm.td6.exo2.controleur

import ihm.td6.exo2.modele.Cercle
import ihm.td6.exo2.vue.Vue
import javafx.util.converter.NumberStringConverter


class ControleurBinding(vue: Vue, modele : Cercle) {
    val vue: Vue
    val modele : Cercle

    init {
        this.vue = vue
        this.modele = modele
    }

    fun bindModeleVue(){
        vue.cercle.radiusProperty().bind(vue.slider.valueProperty())
        vue.cercle.fillProperty().bind(vue.colorPicker.valueProperty())
        vue.textField.textProperty().bindBidirectional(vue.slider.valueProperty(), NumberStringConverter())
        vue.cercle.centerXProperty().bind(vue.scene.widthProperty().divide(2))
        vue.cercle.centerYProperty().bind(vue.scene.heightProperty().divide(2).subtract(60))

    }

}