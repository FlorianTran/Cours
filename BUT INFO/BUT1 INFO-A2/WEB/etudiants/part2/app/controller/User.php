<?php


class User
{
    private UserRepositoryInterface $repository;
    public function __construct()
    {
        $this->repository = new DbUserRepository();
    }

    function debut(){
        include 'view/debut.php';
    }

    function check(){
    $user = $this->repository->findByLogin($_POST['login']);
    if ($user == null) {
        include 'view/error.php';
    }
    else if ($user->isValidePassword($_POST['password'])) {
        include 'view/welcome.php';
    } else {
        include 'view/error.php';
    }
    }

    function error($param){
        //TODO
    }

}