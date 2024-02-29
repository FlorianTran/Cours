<?php
require_once "model/entity/ProductEntity.php";
class ProductModel extends CI_Model {
    function findAll(){
        $this->db->select('*');
        $q = $this->db->get('product');
        $response = $q-> custom_result_object("ProductEntity");
        return $response;
    }

}