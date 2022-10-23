<?php
class DbProductRepository implements ProductRepositoryInterface 
{
    private $connexion;

    public function __construct() {
        $dsn = "sqlite:".CFG["db"]["host"].CFG["db"]["database"];
        $this->connexion = SPDO::getInstance($dsn,CFG["db"]["login"],CFG["db"]["password"],CFG["db"]["options"],CFG["db"]["exec"])
            ->getConnexion();
    }

    public function findAll():Array {
        $statement = $this->connexion->prepare("SELECT * FROM product");
        $statement->execute();
        return $statement->fetchAll(PDO::FETCH_CLASS, "ProductEntity");
    }

    public function findById(int $id): ?ProductEntity
    {
        $statement = $this->connexion->prepare("select *
            from  product where id=:id");
        $statement->bindParam('id',$id);
        $statement->execute();
        $res = $statement->fetch(PDO::FETCH_ASSOC);
        $product = null;
        if ($res) {
            $product = new ProductEntity();
            $product->setId($res["id"]);
            $product->setName($res["name"]);
            $product->setPrice($res["price"]);
            $product->setQuantity($res["quantity"]);
        }
        return $product;
    }
}
?>