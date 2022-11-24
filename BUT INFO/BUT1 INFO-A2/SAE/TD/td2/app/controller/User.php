<?php


class User
{
    private UserRepositoryInterface $repository;
    public function __construct()
    {
        $this->repository = new DbUserRepository();
    }

    function debut(){
        include ("view/debut.php");
    }

    function check(){
        $login = $_POST['login'];
        $password = $_POST ['password'];
        $user = $this->repository->findByLogin($login);
        if ($user !=null&&$user->isValidePassword($password)){
            include "view/welcome.php";
        }else{
            include "view/error.php";
        }

    }

    function error($param){
        //TODO
    }

}