<?php


class DbUserRepository implements UserRepositoryInterface
{

    private $connexion;
    public function __construct()
    {
        $dsn = "sqlite:".CFG["db"]["host"].CFG["db"]["database"];
        $this->connexion = SPDO::getInstance($dsn,CFG["db"]["login"],CFG["db"]["password"],CFG["db"]["options"],CFG["db"]["exec"])
            ->getConnexion();
    }

    public function findByLogin(string $login):?UserEntity
        {
            $statement = $this->connexion->prepare("select *
                from  user where login=:login");
            $statement->bindParam('login',$login);
            $statement->execute();
            $res = $statement->fetch(PDO::FETCH_ASSOC);
            $user = null;
            if ($res) {
                $user = new UserEntity($res["login"],$res["password"],$res["slug"]);
            }
            return $user;
        }

}