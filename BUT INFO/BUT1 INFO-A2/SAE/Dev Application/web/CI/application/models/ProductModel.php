<?php
require_once APPPATH.'models'.DIRECTORY_SEPARATOR."ProductEntity.php";
class ProductModel extends CI_Model {

    function findAll(){
        $this->db->select('*');
        $q = $this->db->get('product');
        $response = $q-> custom_result_object("ProductEntity");
        return $response;
    }

    function findById(int $id):?ProductEntity{
        $req ="select * from product where id=?";
        $q = $this->db->query($req, array($id));
        $response=$q->custom_result_object("ProductEntity");
        return $response[0];
    }

    function add(int $id, string $name, float $price, int $quantity, string $picture){
        $price=abs($price);
        $req="insert into product (id, name, price, quantity, pictures) values (?, ?, ?, ?, ?)";
        $this->db->query($req, array($id, $name, $price, $quantity, $picture));
    }

    function addPictureOfProduct(int $id, int $pos, string $picture){
        $product=$this->findById($id);
        $old_picture_array=$product->getPictures();
        $product->addPictureAtIndex($picture, $pos-1);
        $new_picture_array=$product->getPictures();
        $new_picture_string=implode(", ", $new_picture_array);
        $this->update($id, $product->getName(), $product->getPrice(), $product->getQuantity(), $new_picture_string);
    }
    
    function delete(int $id){
        $req="delete from product where id=?";
        $this->db->query($req, array($id));
    }

    function deletePictureOfProduct(int $id, string $pic){
        $product=$this->findById($id);
        $old_picture_array=$product->getPictures();
        $product->deletePicture($pic);
        $new_picture_array=$product->getPictures();
        $new_picture_string=implode(", ", $new_picture_array);
        $this->update($id, $product->getName(), $product->getPrice(), $product->getQuantity(), $new_picture_string);
    }

    function update(int $id, string $name, float $price, int $quantity, string $picture){
        $price=abs($price);
        $req="update product set name=?, price=?, quantity=?, pictures=? where id=?";
        $this->db->query($req, array($name, $price, $quantity, $picture, $id));
    }
    // PENSER A TRAITER LES POTENTIELLES ERREURES SQL

    function updatePictureOfProduct(int $id, string $old_picture, string $picture){
        $product=$this->findById($id);
        $old_picture_array=$product->getPictures();
        $index=array_search($old_picture, $old_picture_array);
        $product->setPictureAtIndex($picture, $index);
        $new_picture_array=$product->getPictures();
        $new_picture_string=implode(", ", $new_picture_array);
        $this->update($id, $product->getName(), $product->getPrice(), $product->getQuantity(), $new_picture_string);
    }




    //PANIER

    function getAllCartArray():array{
		if ($this->input->cookie("cart")==null)
			return array();
		else 
			$str= $this->input->cookie("cart");
			$arr=explode("/", $str);
			$new_array=array();
			foreach ($arr as $a){
				$b=explode(",",$a);
				array_push($new_array, $b);
			}
			return $new_array;
	}

	function getAllCart():string{
		if ($this->input->cookie("cart")==null)
			return "";
		else 
			$str= $this->input->cookie("cart");
			return $str;
	}

    public function checkCartStock(int $id, int $wanted_quantity):Bool{
        $product=$this->findById($id);
        $qty=$product->getQuantity();
        if ($qty>=$wanted_quantity)
            return TRUE;
        else 
            return FALSE;
    }

}