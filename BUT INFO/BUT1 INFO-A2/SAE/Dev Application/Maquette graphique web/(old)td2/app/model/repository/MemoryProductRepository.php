<?php
class   MemoryProductRepository implements ProductRepositoryInterface
{
    public function findAll(): array {
        $p1 = new ProductEntity();
        $p1->setId(1);
        $p1->setName("p1");
        $p1->setPrice(10.0);
        $p1->setQuantity(2);

        $p2 = new ProductEntity();
        $p2->setId(2);
        $p2->setName("p2");
        $p2->setPrice(20.0);
        $p2->setQuantity(2);

        return array(
            $p1,
            $p2);
    }
}

?>