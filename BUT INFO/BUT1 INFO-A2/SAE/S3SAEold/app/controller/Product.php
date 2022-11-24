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
        include "view".DIRECTORY_SEPARATOR."displayProduct.php";
    }

    function add(){
        include "view".DIRECTORY_SEPARATOR."addProduct.php";
    }

    function addProduct(){
        $product = new ProductEntity();
        $product->setId(intval($_POST["id"]));
        $product->setName($_POST["name"]);
        $product->setPrice(floatval($_POST["price"]));
        $product->setQuantity(intval($_POST["quantity"]));
        $product = $this->repository->add($product);
        header("Location: ".CFG['siteURL']);
    }

    function delete(array $infos){
        $id=$infos[0];
        $del=$this->repository->delete($id);
        header("Location: ".CFG['siteURL']);
    }
    

}
