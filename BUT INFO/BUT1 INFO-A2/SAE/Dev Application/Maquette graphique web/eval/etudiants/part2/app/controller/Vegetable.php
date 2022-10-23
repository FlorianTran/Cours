<?php


class Vegetable
{
    private VegetableRepositoryInterface $repository;
    public function __construct()
    {
        $this->repository = new DbVegetableRepository();
    }

    function debut(){
        include 'view/debut.php';
    }

    function check(){
        $vege = $this->repository->findByName($_POST['name']);
        $vege->setComment($_POST["comment"]);
        if($vege == null) {
            include 'view/error.php';
        }else if ($vege->isCommentable()==true) {
            if ($vege->getComment() != null) {
                include 'view/welcome.php';
            } else {
                include 'view/error.php';
            }
        } else if ($vege->isCommentable()==false){
            if ($vege->getComment() == null) {
                include 'view/welcome.php';
            } else {
                include 'view/error.php';
            }
        }
        else {
            include 'view/error.php';
        }
    }
}





