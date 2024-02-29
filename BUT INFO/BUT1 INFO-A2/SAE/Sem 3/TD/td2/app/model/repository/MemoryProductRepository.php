<?php


class MemoryProductRepository implements ProductRepositoryInterface{
    public function findAll(): array{
        $p1 = new ProductEntity();
        $p1->setId(1);
        $p1->setName("Pomme");
        $p1->setPrice(1.0);
        $p1->setQuantity(35);

        $p2 = new ProductEntity();
        $p2->setId(2);
        $p2->setName("Fraise");
        $p2->setPrice(2.5);
        $p2->setQuantity(25);

        return Array($p1,$p2);
    }
}
?>