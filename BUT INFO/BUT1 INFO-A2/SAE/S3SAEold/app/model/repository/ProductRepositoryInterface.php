<?php
Interface ProductRepositoryInterface
{
public function findAll(): array;
public function findById(int $id):?ProductEntity;
public function delete(int $id):bool;
}
?>