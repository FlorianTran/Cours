<?php

class DbUserRepository implements UserRepositoryInterface
{
    
    private $connexion;
    public function __construct()
    {
        $dsn = "sqlite:"."data/madb.db";
        $this->connexion = SPDO::getInstance($dsn,CFG["db"]["login"],CFG["db"]["password"],CFG["db"]["options"],CFG["db"]["exec"])
            ->getConnexion();
    }

    public function findAll(): array
    {
        $statement = $this->connexion->prepare("SELECT * FROM user");
        $statement->execute();
        return $statement->fetchAll(PDO::FETCH_CLASS, "UserEntity");
    }

    public function findByPseudo(string $pseudo): ?UserEntity
    {
        $statement = $this->connexion->prepare("select *
            from  user where pseudo=:pseudo");
        $statement->bindParam('pseudo',$pseudo);
        $statement->execute();
        $res = $statement->fetch(PDO::FETCH_ASSOC);
        $user = null;
        if ($res) {
            $user = new UserEntity($res["pseudo"],"abcd1",$res["status"]);
            //echo $res["password"];
        }
        return $user;
    }

    public function add(UserEntity $user): ?UserEntity
    {
        $pseudo = $user->getPseudo();
        $password = $user->getPassword();
        $status = $user->getStatus();
        try {
            $statement = $this->connexion->prepare("insert into user values(:pseudo,:password,:status)");
            $statement->bindParam('pseudo', $id);
            $statement->bindParam('password', $password);
            $statement->bindParam('status', $status);
            $statement->execute();
        } catch (Exception $e){}
        $user = $this->findByPseudo($pseudo);
        return $user;
    }

    public function delete(string $pseudo): bool
    {
        $statement = $this->connexion->prepare("delete from user where pseudo=:pseudo");
        $statement->bindParam('pseudo',$pseudo);
        $res = $statement->execute();
        return $res;
    }

    public function update(string $pseudoS, UserEntity $user): ?UserEntity
    {
        $pseudo = $user->getPseudo();
        $password = $user->getPassword();
        $status = $user->getStatus();

        try{
            $statement = $this->connexion->prepare("
            update user 
            set pseudo=:pseudo, password=:password, status=:status
            where psueduo=:pseudo");
            $statement->bindParam('pseudo', $pseudo);
            $statement->bindParam('password', $password);
            $statement->bindParam('status', $status);
            $statement->execute();
        } catch (Exception $e){}
        $user = $this->findByPseudo($user);
        return $user;
    }
}
