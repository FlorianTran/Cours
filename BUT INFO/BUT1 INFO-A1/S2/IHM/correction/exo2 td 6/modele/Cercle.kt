package ihm.td6.exo2.modele

import javafx.scene.shape.Circle
import kotlin.math.PI

class Cercle : Circle(){

    fun surface(r : Double) = PI*r*r

    fun perimetre(r : Double) = 2 * PI * r


}