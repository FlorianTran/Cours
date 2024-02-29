<?php
class Home
{
    private ProductRepositoryInterface $repository;
    public function __construct(){
        $this->repository = new DbProductRepository();
    }
    function index(){
        $data = $this->repository->findAll();
        require "view".DIRECTORY_SEPARATOR."home.php";

    }
    function method(){
        echo "method";
    }
    function methodeWithParameter(array $params){
        var_dump($params);
    }
}
?>