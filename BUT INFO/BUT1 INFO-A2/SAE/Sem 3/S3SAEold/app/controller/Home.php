<?php
class Home
{
    private ProductRepositoryInterface $repository;
    public function __construct(){
        $this->repository = new DbProductRepository();
    }
    function index(){
        $data = $this->repository->findAll();
        require "view/home.php";

    }
    function method(){
        echo "method";
    }
    function methodeWithParameter(array $params){
        var_dump($params);
    }
}

// defined('BASEPATH') OR exit('No direct script access allowed');
// class Home extends CI_Controller {
//     public function __construct() {
//         parent::__construct();
//         $model = new ProductModel();
//     }
//     public function index(){
//         $data = $model->findAll();
//         require "view/home.php";
//     }
// }
?>