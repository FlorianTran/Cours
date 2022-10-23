<?php
class Product {
 
    private ProductRepositoryInterface $rep;

    public function __construct(){
        $this->rep=new DbProductRepository();
    }

    function display(array $params) {
        $id = intval($params[0]);
        $product =  $this->rep->findById($id);
        require "view".DIRECTORY_SEPARATOR."displayProduct.php";
    }
    
}
?>