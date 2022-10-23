<?php
require_once "VegetableEntity.php";

class VegetablesEntities
{
    private array $vegetables;

    public function __construct(){
        $this->vegetables = array(
            new VegetableEntity("carotte"),
            new VegetableEntity("pomme de terre",true),
            new VegetableEntity("chou",true));
    }

    public function findByName(string $name):?VegetableEntity {
        $res = array_filter($this->vegetables, fn ($vegetable)=>
            $vegetable->getName() == $name
        );
        return count($res)==0? null : array_pop($res);
    }
}