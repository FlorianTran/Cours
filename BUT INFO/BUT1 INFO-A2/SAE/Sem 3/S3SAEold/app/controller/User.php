<?php


class User
{
    private UserRepositoryInterface $repository;
    public function __construct()
    {
        $this->repository = new DbUserRepository();
    }

    function login(){
        require "view/login.php";
    }

    function loginCheck(){

        $pseudo = $_POST['login'];
        $password = $_POST ['password'];
        $user = $this->repository->findByPseudo($pseudo);
        if ($user !=null && $user->isValidPassword($password)) {
            session_start();
            $_SESSION['login']=array("pseudo"=>$user->getPseudo(), "status"=>$user->getStatus());
            header("Location: ".CFG['siteURL']);
            die();
        }
        require 'view/accessDenied.php';

    }
    function logout(){
        session_start();
        unset($_SESSION["login"]);
        header("Location: ".CFG['siteURL']);
    }

}
