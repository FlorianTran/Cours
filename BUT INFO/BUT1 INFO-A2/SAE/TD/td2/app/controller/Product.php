<?php
   

class Product
{
    private ProductRepositoryInterface $repository;
    public function __construct()
    {
        $this->repository = new DbProductRepository();
    }

    function display(  array $params){
        $id = intval($params[0]);
        $product =  $this->repository->findById($id);
        require "view".DIRECTORY_SEPARATOR."displayProduct.php";
    }

    function add(){
        require "view".DIRECTORY_SEPARATOR."addProduct.php";
    }

    function addProduct(){
        $product = new ProductEntity();
        $product->setId(intval($_POST["id"]));
        $product->setName($_POST["name"]);
        $product->setPrice(floatval($_POST["price"]));
        $product->setQuantity(intval($_POST["quantity"]));
        $product = $this->repository->add($product);
        $data = $this->repository->findAll();
        require "view".DIRECTORY_SEPARATOR."home.php";
    }


}
