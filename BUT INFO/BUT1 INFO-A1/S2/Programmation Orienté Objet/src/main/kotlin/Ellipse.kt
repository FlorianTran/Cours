open class Ellipse (xx : Int, yy : Int, axeVertical : Int, axeHorizontal : Int) : FormeGeo(xx, yy , axeVertical, axeHorizontal){

    override fun dessiner() : String{
        return "(X=$xx,Y=$yy,AV=$hauteur,AH=$largeur)"
    }
}