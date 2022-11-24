<?php
class PictureEntity extends CI_Model{
    private int $id;
    private int $productId;
    private string $value;
    /**
    * @return int
    */
    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id)
    {
        $this->id=$id;
    }
    /**
    * @return string
    */
    public function getProductId(): int
    {
        return $this->productId;
    }

    public function setProductId(int $id)
    {
        $this->id=$id;
    }

    public function getValue(): string
    {
        return $this->value;
    }

    public function setValue(string $val)
    {
        $this->id=$val;
    }
}
?>