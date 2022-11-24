<?php
require_once APPPATH.'models'.DIRECTORY_SEPARATOR."UserEntity.php";
class UserModel extends CI_Model {

    function findByPseudo(string $pseudo): ?UserEntity{
        $request="select * from user where pseudo=?";
        $q=$this->db->query($request, array($pseudo));
        $response = $q->custom_result_object("UserEntity");
        if ($response!=null)
            return $response[0];
        else
            return null;
    }

    function findAll(){
        //FIRST WAY TO GET ALL USERS
        $this->db->select('*')->from("user");
        $this->db->order_by('status', 'ASC')->order_by('pseudo', 'ASC');
        $q = $this->db->get();
        
        $response = $q-> custom_result_object("UserEntity");
        //OTHER WAY TO GET ALL USERS
        //$req="select * from user";
        //$this->db->query($req);
        return $response;
    }

    function add(string $pseudo, string $password, string $status){
        //FIRST WAY TO INSERT
        $data = [
            'pseudo' => $pseudo,
            'password'  => $password,
            'status'  => $status,
        ];
        $this->db->insert('user', $data);
        //OTHER WAY TO INSERT
        //$req="insert into user (pseudo, password, status) values (?, ?, ?)";
        //$this->db->query($req, array($pseudo, $password, $status));
    }
    
    function delete(string $pseudo){
        //FIRST WAY TO DELETE
        $data=[
            'pseudo'=>$pseudo
        ];
        $this->db->delete("user", $data);
        //OTHER WAY TO DELETE
        //$req="delete from user where pseudo=?";
        //$this->db->query($req, array($pseudo));
    }

    function update(string $pseudo, string $password, string $status){
        //FIRST WAY TO DELETE
        $data=[
            "pseudo"=>$pseudo,
            "password"=>$password,
            "status"=>$status
        ];
        $this->db->replace('user', $data);
        //OTHER WAY TO DELETE
        //$req="update user set password=?, status=? where pseudo=?";
        //$this->db->query($req, array($password, $status, $pseudo));
    }

}