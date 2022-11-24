<?php


class UserEntity
{
    private string $pseudo;
    private string $password;
    private string $status;
    /**
     * User constructor.
     * @param string $pseudo
     * @param string $password
     */
    public function __construct(string $pseudo, string $password, string $status)
    {
        $this->pseudo = $pseudo;
        $this->password = $password;
        $this->status = $status;
    }


    public function isValidPassword(string $password):bool{
        return $this->password == $password;
    }


    /**
     * @param string $pseudo
     */
    public function setpseudo(string $pseudo): void
    {
        $this->pseudo = $pseudo;
    }

    /**
     * @param string $password
     */
    public function setPassword(string $password): void
    {
        $this->password = $password;
    }

    /**
     * @return string
     */
    public function getstatus(): string
    {
        return $this->status;
    }

    /**
     * @param string $status
     */
    public function setstatus(string $status): void
    {
        $this->status = $status;
    }

    /**
     * @return string
     */
    public function getpseudo(): string
    {
        return $this->pseudo;
    }

    /**
     * @return string
     */
    public function getPassword(): string
    {
        return $this->password;
    }


}