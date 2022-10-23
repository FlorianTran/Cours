import org.junit.jupiter.api.Test

import org.junit.jupiter.api.Assertions.*

import kotlin.reflect.full.allSuperclasses
import kotlin.reflect.full.memberProperties
import kotlin.reflect.KVisibility

class TestCarre {

    val kClass = Carre::class

    @Test
    fun `Rectangle verif`() {
        assertAll(
            {assertFalse(kClass.isAbstract)},
            {assertFalse(kClass.isOpen)},
        )
    }

    @Test
    fun `ObjetPositionnable verif 2`() {
        var extend = kClass.allSuperclasses.find { it.simpleName == "Selectionnable" }
        assertNotNull(extend)
    }

    @Test
    fun `ObjetPositionnable verif 3`() {
        var extend = kClass.allSuperclasses.find { it.simpleName == "ObjetGraphique" }
        assertNotNull(extend)
    }

    @Test
    fun `ObjetPositionnable verif 4`() {
        var extend = kClass.allSuperclasses.find { it.simpleName == "Manipulable" }
        assertNotNull(extend)
    }

    @Test
    fun `Forme Geo 4`() {
        var extend = kClass.allSuperclasses.find { it.simpleName == "Redimensionnable" }
        assertNotNull(extend)
    }

    @Test
    fun `Rectangle 4`() {
        var extend = kClass.allSuperclasses.find { it.simpleName == "FormeGeo" }
        assertNotNull(extend)
    }

    @Test
    fun `Rectangle 5`() {
        var extend = kClass.allSuperclasses.find { it.simpleName == "Rectangle" }
        assertNotNull(extend)
    }

    @Test
    fun `ObjetPositionnable verif 5`() {
        var member = kClass.memberProperties.find { it.name == "xx" }
        assertAll(
            { assertEquals(KVisibility.PROTECTED, member!!.visibility) },
            { assertFalse(member!!.isOpen) },
            { assertFalse(member!!.isAbstract) },
            { assertEquals("kotlin.Int", member!!.returnType.toString()) },
        )
    }

    @Test
    fun `ObjetPositionnable verif 6`() {
        var member = kClass.memberProperties.find { it.name == "yy" }
        assertAll(
            { assertEquals(KVisibility.PROTECTED, member!!.visibility) },
            { assertFalse(member!!.isOpen) },
            { assertFalse(member!!.isAbstract) },
            { assertEquals("kotlin.Int", member!!.returnType.toString()) },
        )
    }

    @Test
    fun `FormeGeo verif 1`() {
        var member = kClass.memberProperties.find { it.name == "hauteur" }
        assertAll(
            {assertEquals(KVisibility.PROTECTED, member!!.visibility)},
            {assertFalse(member!!.isOpen)},
            {assertFalse(member!!.isAbstract)},
            {assertEquals("kotlin.Int", member!!.returnType.toString())},
        )
    }

    @Test
    fun `FormeGeo verif 2`() {
        var member = kClass.memberProperties.find { it.name == "largeur" }
        assertAll(
            {assertEquals(KVisibility.PROTECTED, member!!.visibility)},
            {assertFalse(member!!.isOpen)},
            {assertFalse(member!!.isAbstract)},
            {assertEquals("kotlin.Int", member!!.returnType.toString())},
        )
    }

    @Test
    fun `dessiner`() {
        val objet : Manipulable = Carre(4,2,42)
        assertEquals("[X=4,Y=2,H=42,L=42]", objet.dessiner())
    }

}
