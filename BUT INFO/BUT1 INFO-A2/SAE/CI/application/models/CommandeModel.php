<?php
require_once APPPATH.'models'.DIRECTORY_SEPARATOR."CommandeEntity.php";
class CommandeModel extends CI_Model {


    function addCommandFromCart(){
        session_start();
        if (isset($_SESSION["login"]["pseudo"])) $pseudo=$_SESSION["login"]["pseudo"];
        $this->load->model('ProductModel');
        $allCartProducts=$this->ProductModel->getAllCartArray();
        foreach ($allCartProducts as $product){
            $data = [
                    'id' => 2,
                    'refprod'  => $product[0],
                    'login'  =>$pseudo,
                    'quantity'  => $product[1],
                    'price'  => 5
                ];
            $this->db->insert('commande', $data);
        }
    }

    function getAllCommands(){
        $this->db->select('*');
        $q = $this->db->get('commande');
        $response = $q-> custom_result_object("CommandeEntity");
        echo $response[0]->getLogin();
        return $response;
    }

    function getAllCommandsFromUser(string $login){
        $allCommands=$this->getAllCommands();
        $returnArray=array();
        foreach ($allCommands as $command){
            if($command[0] == $login){
                array_push($returnArray, $command);
            }
        }
        return $returnArray;
    }

}