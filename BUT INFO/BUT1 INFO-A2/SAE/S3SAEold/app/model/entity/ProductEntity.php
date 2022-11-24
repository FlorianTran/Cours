<?php
class ProductEntity
{
    private int $id;
    private string $name;
    private float $price;
    private int $quantity;
    /**
    * @return int
    */
    public function getId(): int
    {
        return $this->id;
    }
    /**
    * @return string
    */
    public function getName(): string
    {
        return $this->name;
    }
    /**
    * @return float
    */
    public function getPrice(): float
    {
        return $this->price;
    }
    /**
    * @return int
    */
    public function getQuantity(): int
    {
        return $this->quantity;
    }
    /**
    * @param int $id
    */
    public function setId(int $id): void
    {
        $this->id = $id;
    }
    /**
    * @param string $name
    */
    public function setName(string $name): void
    {
        $this->name = $name;
    }
    /**
    * @param float $price
    */
    public function setPrice(float $price): void
    {
        $this->price = $price;
    }
    /**
    * @param int $quantity
    */
    public function setQuantity(int $quantity): void
    {
        $this->quantity = $quantity;
    }
}
?>