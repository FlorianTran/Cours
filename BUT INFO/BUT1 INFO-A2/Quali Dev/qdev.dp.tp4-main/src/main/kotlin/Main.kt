import iut.info2.tp4.Hashable
import iut.info2.tp4.Hashtable
import java.io.File
import kotlin.system.measureNanoTime

fun main() {
    data class Word(public var mot: String): Hashable {
        override fun hash(): Int {
            return mot.length
        }
    }
    val mutList = mutableListOf<String>()
    val hashtab = Hashtable<Word>(128)

    File("data/dico-en.txt").forEachLine {
        mutList.add(it)
        hashtab.add(Word(it))
    }

    var time = measureNanoTime {
        println(hashtab.contains(Word("mqlksdfj")))
    }
    println(time)
}