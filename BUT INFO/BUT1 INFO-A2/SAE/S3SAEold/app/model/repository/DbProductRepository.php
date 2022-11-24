<?php


class DbProductRepository implements ProductRepositoryInterface{
    private $connexion;
    public function __construct()
    {   
        $dsn = "sqlite:"."data/mdb.db";
        $this->connexion = SPDO::getInstance($dsn,CFG["db"]["login"],CFG["db"]["password"],CFG["db"]["options"],CFG["db"]["exec"])
        ->getConnexion();
    }

    public function findAll(): array{
        $statement = $this->connexion->prepare("SELECT * FROM product");
        $statement->execute();
        return $statement->fetchAll(PDO::FETCH_CLASS, "ProductEntity");
    }

    public function findById(int $id):?ProductEntity{
        $statement = $this->connexion->prepare("select *
            from product where id=:id");
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
    
    public function add(ProductEntity $product): ?ProductEntity
    {
        $id = $product->getId();
        $name = $product->getName();
        $price = $product->getPrice();
        $quantity = $product->getQuantity();
        try {
            $statement = $this->connexion->prepare("INSERT INTO product VALUES(:id,:name,:price,:quantity)");
            $statement->bindParam('id', $id);
            $statement->bindParam('name', $name);
            $statement->bindParam('price', $price);
            $statement->bindParam('quantity', $quantity);
            $statement->execute();
        } catch (Exception $e){}
        $product = $this->findById($id);
        return $product;
    }

    public function delete(int $id):bool{
        $statement = $this->connexion->prepare("delete from product where id=:id");
        $statement->bindParam('id',$id);
        $res = $statement->execute();
        return $res ;
    }

    

}
?>