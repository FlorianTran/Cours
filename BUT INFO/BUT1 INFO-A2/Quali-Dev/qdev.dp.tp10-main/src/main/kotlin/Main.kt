import io.ktor.client.*
import io.ktor.client.call.*
import io.ktor.client.engine.cio.*
import io.ktor.client.request.*
import io.ktor.client.statement.*
import kotlinx.serialization.*
import kotlinx.serialization.json.Json

suspend fun main() {
    /*val client = HttpClient(CIO)
    val response: HttpResponse = client.get("http://jsonplaceholder.typicode.com/todos/")
    println(response.status)
    var json = Json.decodeFromString<List<Todo>>(response.body<String>())
    */
    val client = HttpClient(CIO)
    val response: HttpResponse = client.get("https://dummyjson.com/products?limit=100")
    println(response.status)
    val json = Json.decodeFromString<Full>(response.body<String>())
    val moto = json.products.filter{it .category == "motorcycle"}
    println(json)
    println("nb de moto: " + moto.count())
    val stock = json.products.filter { it.stock<50 }.sortedBy { it.stock }
    println("nb Stock: " + stock.count())
    client.close()
}
