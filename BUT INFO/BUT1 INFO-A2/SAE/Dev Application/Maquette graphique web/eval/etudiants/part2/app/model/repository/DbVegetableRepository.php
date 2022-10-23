<?php


class DbVegetableRepository implements VegetableRepositoryInterface
{

    private $connexion;
    public function __construct()
    {
        $dsn = "sqlite:".CFG["db"]["host"].CFG["db"]["database"];
        $this->connexion = SPDO::getInstance($dsn,CFG["db"]["login"],CFG["db"]["password"],CFG["db"]["options"],CFG["db"]["exec"])
            ->getConnexion();
    }

    public function findByName(string $name):?VegetableEntity {
        $statement = $this->connexion->prepare("select *
                from vegetable where name=:name");
                $statement->bindParam('name',$name);
                $statement->execute();
                $res = $statement->fetch(PDO::FETCH_ASSOC);
                $vege = null;
                if ($res) {
                    $vege = new VegetableEntity($res['name'],$res['commentable'],$res['comment']);
                }
                return $vege;
            }
        }