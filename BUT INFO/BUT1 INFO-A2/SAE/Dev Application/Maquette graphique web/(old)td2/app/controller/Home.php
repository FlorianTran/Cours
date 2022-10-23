<?php
    class Home {

        private ProductRepositoryInterface $rep;

        public function __construct(){
            $this->rep=new DbProductRepository();
        }

        function index(){
            $pdts = $this->rep->findAll();
            require "view".DIRECTORY_SEPARATOR."home.php";
        }

        function method(){
            echo("method");
        }
        
        function methodeWithParameter(array $params){
            var_dump($params);
        }
    }
?>