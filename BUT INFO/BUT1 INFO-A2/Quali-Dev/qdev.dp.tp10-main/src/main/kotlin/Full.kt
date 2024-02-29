import kotlinx.serialization.Serializable

@Serializable
data class Full (
    val products : MutableList<Product>,
    val total: Int,
    val skip: Int,
    val limit: Int,
)