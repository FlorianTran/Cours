<?php
class ProductEntity extends CI_Model{
    private int $id;
    private string $name;
    private float $price;
    private int $quantity;
    private string $pictures;
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

//RETOURNE LE NOMBRE DE PHOTOS ASSOSCIEES AU PRODUIT
    public function getPicturesSize(): int
    {
        $pics=explode(', ', $this->pictures);
        return sizeof($pics);
    }

//RETOURNE UNE PHOTO EN FONCTION DE L'INDEX
    public function getPicture(int $index): string
    {
        $pics=explode(', ', $this->pictures);
        return $pics[$index];
    }

    public function deletePicture(string $picture): void{
        $pics=$this->getPictures();
        unset($pics[array_search($picture, $pics)]);
        $this->setPictures(implode(', ', $pics));
    }

    public function getPictures(): Array
    {
        $pics=explode(', ', $this->pictures);
        return $pics;
    }

    public function getPicturesString(): String
    {
        return $this->pictures;
    }

    public function setPictures(string $picture): void
    {
        $this->pictures=$picture;
    }

    public function setPictureAtIndex(string $picture, int $index): void{
        $pics=array_replace($this->getPictures(), array($index => $picture));
        $this->setPictures(implode(', ', $pics));
    }

    public function addPictureAtIndex(string $picture, int $index){
        $a=array_slice($this->getPictures(), 0, $index);
        $b=array($picture);
        $c=array_slice($this->getPictures(), $index);
        $ab=array_merge($a,$b);
        $pics=array_merge($ab, $c);
        $this->setPictures(implode(', ', $pics));
    }
}
?>