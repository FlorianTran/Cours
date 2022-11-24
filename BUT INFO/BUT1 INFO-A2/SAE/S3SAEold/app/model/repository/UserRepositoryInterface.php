<?php

Interface UserRepositoryInterface
{
    public function findAll(): array;
    public function findByPseudo(string $pseudo):?UserEntity;
    public function add(UserEntity $user):?UserEntity;
    public function delete(string $pseudo):bool;
    public function update(string $pseudoS, UserEntity $user):?UserEntity;
}
