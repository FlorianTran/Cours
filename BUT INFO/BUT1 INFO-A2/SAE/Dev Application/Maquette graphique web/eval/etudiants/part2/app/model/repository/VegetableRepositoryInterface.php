<?php

Interface VegetableRepositoryInterface
{

    public function findByName(string $name):?VegetableEntity;

}