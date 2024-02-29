import java.lang.Math.random

fun monegasque(n: Int): MutableList<String> {
    var t: MutableList<String> = mutableListOf()
    var rd: Int
    for (i in 0..n) {
        rd = (0..1).random()
        if (rd == 0) {
            t.add("B")
        } else {
            t.add("R")
        }
    }
    return t
}

fun sortMonegasque(t: MutableList<String>): MutableList<String> {
    val n = t.size-1
    for (i in 0 until n) {
        require(t[i] == "B" || t[i] == "R")
    }
    var i = 1
    var k = n
    var tmp = ""
    while (k != i) {
        if (t[i] == "B") {
            i++
        } else {
            tmp = t[i]
            t[i] = t[k]
            t[k] = tmp
            k--
        }
        for (u in 0 until i - 1) {
            check(t[u] == "B")
        }
        check(0 < i)
        check(i <= k)
        check(k <= n + 1)
        for (u in k + 1 until n) {
            check(t[u] == "R")
        }
    }
    for (u in 0 until i) {
        assert(t[u] == "B")
    }
    for (u in k + 1 until n) {
        assert(t[u] == "R")
    }
    assert(i == k)
    return t
}

fun main() {
    val tab = monegasque(10)
    print(sortMonegasque(tab))
}