<?php
defined('BASEPATH') OR exit('No direct script access allowed');


/**
 * [Description Product]
 */
class Product extends CI_Controller {

	
	public function __construct(){
		parent::__construct();
		$this->load->helper('url');
		$this->load->helper('file');
		$this->load->helper('cookie');
		$this->load->model('ProductModel');
		$this->load->model('ProductEntity');
	}
	
	/**
	 * [Description for display]
	 *
	 * @param int $id
	 * 
	 * @return [type]
	 * 
	 */
	public function display(int $id){
		$product=$this->ProductModel->findById($id);
		$this->load->view('displayProduct',  array('product' => $product));
	}






	// --------------------------------ADD-------------------------------//
	
	/**
	 * [Description for add]
	 *
	 * @return [type]
	 * 
	 */
	public function add(){
		$allProducts=$this->findFreeId();
		$data["freeId"]=$allProducts;
		$this->load->view('addProduct', $data);
	}
	

	
	public function addProduct(){
		$picture=$this->upload();
		$id= $this->input->post('id');
		$name = $this->input->post('name');
		$price= $this->input->post('price');
		$quantity= $this->input->post('quantity');
		$this->ProductModel->add($id, $name, $price, $quantity, $picture);
		redirect('Home/admin', 'refresh');
	}

	public function addPictureOfProduct(int $id){
		$product=$this->ProductModel->findById($id);
		$picture=$this->upload();
		if (isset($_POST['pos']))
			$pos=$_POST['pos'] ;
		else
			$pos=0;
		$count=$product->getPicturesSize();
		if($count==1 && $product->getPicture(0)=="error/null.jpg"){
			$this->ProductModel->update($id, $product->getName(), $product->getPrice(), $product->getQuantity(), $picture);
			redirect("Product/update/".$id, "refresh");
		}
		else{
			$this->ProductModel->addPictureOfProduct($id, $pos, $picture);
			redirect("Product/update/".$id, "refresh");
		}
	}





	// --------------------------------DELETE-------------------------------//
	
	
	/**
	 * [Description for delete]
	 *
	 * @param int $id
	 * 
	 * @return [type]
	 * 
	 */
	public function delete(int $id){
		$product=$this->ProductModel->findById($id);
		$count=$product->getPicturesSize();
		for ($i=0; $i<$count; $i++){
			if ($product->getPicture($i) != "error/null.jpg"){
				unlink("./public/img/products/".$product->getPicture($i));
			}
		}
		$this->ProductModel->delete($id);
		redirect("Home/admin");
	}

	public function deletePictureOfProduct(int $id, string $picture){
		$product=$this->ProductModel->findById($id);
		$count=$product->getPicturesSize();
		if($count==1){
			$index=array_search($picture,$product->getPictures());
			unlink("./public/img/products/".$product->getPicture($index));
			$this->ProductModel->update($id, $product->getName(), $product->getPrice(), $product->getQuantity(), "error/null.jpg");
			redirect("Product/update/".$id, "refresh");
		} else {
			$index=array_search($picture,$product->getPictures());
			unlink("./public/img/products/".$product->getPicture($index));
			$this->ProductModel->deletePictureOfProduct($id, $picture);
			redirect("Product/update/".$id, "refresh");
		}
	}



	// --------------------------------UPDATE-------------------------------//

	/**
	 * [Description for update]
	 *
	 * @param int $id
	 * 
	 * @return [type]
	 * 
	 */
	public function update(int $id){
		$data["id"]=$id;
		$product=$this->ProductModel->findById($id);
		$data["name"]=$product->getName();
		$data["price"]=$product->getPrice();
		$data["quantity"]=$product->getQuantity();
		$data["allpictures"]=$product->getPictures();
		$this->load->view('updateProduct', $data);
	}
	
	/**
	 * [Description for updateProduct]
	 *
	 * @return [type]
	 * 
	 */
	public function updateProduct(){
		
		$id= $this->input->post('id');
		$name = $this->input->post('name');
		$price= $this->input->post('price');
		$quantity= $this->input->post('quantity');
		$product=$this->ProductModel->findById($id);
		$pictures=$product->getPictures();
		$picture=implode(", ", $pictures);
		$this->ProductModel->update($id, $name, $price, $quantity, $picture);
		redirect('Home/admin', 'refresh');
	}

	public function updatePictureOfProduct(int $id, string $old_picture){
		$product=$this->ProductModel->findById($id);
		$picture=$this->upload();
		$count=$product->getPicturesSize();
		if($count==1){
			$this->ProductModel->update($id, $product->getName(), $product->getPrice(), $product->getQuantity(), $picture);
			redirect("Product/update/".$id, "refresh");
		}
		else{
			$this->ProductModel->updatePictureOfProduct($id, $old_picture, $picture);
			redirect("Product/update/".$id, "refresh");
		}
	}








	// --------------------------------UPLOAD-------------------------------//


	public function upload():string { 
		$config['upload_path']   = 'public/img/products/'; 
		$config['allowed_types'] = 'gif|jpg|png|jpeg';  
		$config['encrypt_name']=FALSE;
		$this->load->library('upload', $config);
		//SE CONCERTER PAR RAPPORT A LA NECESSITE D'ENCRYPTER LE NOM DES IMAGES
		if (is_array($_FILES['userfile']['name'])){
			$countfiles = count($_FILES['userfile']['name']);
		}
		else {
			if( ! $this->upload->do_upload('userfile')){
				$data["upload_error"]=$this->upload->display_errors(); 
				$this->load->view('addProduct', $data);
				return "error/null.jpg";
			} else {
				$uploadData = $this->upload->data();
				$filename = $uploadData['file_name'];
				return $filename;
			}
		}

		//CAS OU 0 FICHIERS CHARGES
		if ($_FILES['userfile']['name'][0]==""){
			return "error/null.jpg";
		}

		//CAS OU FICHIER CHARGE
		else if ($countfiles==1){
			if(!empty($_FILES['userfile']['name'][0])){
				// Define new $_FILES array - $_FILES['file']
				$_FILES['file']['name'] = $_FILES['userfile']['name'][0];
				$_FILES['file']['type'] = $_FILES['userfile']['type'][0];
				$_FILES['file']['tmp_name'] = $_FILES['userfile']['tmp_name'][0];
				$_FILES['file']['error'] = $_FILES['userfile']['error'][0];
				$_FILES['file']['size'] = $_FILES['userfile']['size'][0];

				if( ! $this->upload->do_upload('file')){
			// Get data about the file
					$data["upload_error"]=$this->upload->display_errors(); 
					$this->load->view('addProduct', $data);
					return "error/null.jpg";
				} else {
					$uploadData = $this->upload->data();
					$filename = $uploadData['file_name'];
					return $filename;
				}
			}

		}

		//CAS OU PLUSIEURS FICHIERS CHARGES 
		else{
			$files=array();
			for ($i=0; $i<$countfiles; $i++){
				if(!empty($_FILES['userfile']['name'][$i])){
					// Define new $_FILES array - $_FILES['file']
					$_FILES['file']['name'] = $_FILES['userfile']['name'][$i];
					$_FILES['file']['type'] = $_FILES['userfile']['type'][$i];
					$_FILES['file']['tmp_name'] = $_FILES['userfile']['tmp_name'][$i];
					$_FILES['file']['error'] = $_FILES['userfile']['error'][$i];
					$_FILES['file']['size'] = $_FILES['userfile']['size'][$i];

					if($this->upload->do_upload('file')){
				// Get data about the file
		 				$uploadData = $this->upload->data();
		 				$filename = $uploadData['file_name'];
						array_push($files, $filename);
					}
				}
			}
			//On retourne le tableau de noms de fichiers sous la forme d'un string exploitable par la suite (, et espace)
			if (empty($files))
				return "error/null.jpg";
			else
				return implode(', ', $files);
		}
	}




	// --------------------------------OTHER FUNCTIONS-------------------------------//
	
	public function findFreeId():int{
		$allProducts=$this->ProductModel->findAll();
		$allIds=array();
		foreach($allProducts as $product){
			array_push($allIds, $product->getId());
		}
		if (empty($allIds)){
			return 1;
		}
		if ($allIds[0]!=1){
			return 1;
		} else {
			for ($i=2; $i<=sizeof($allIds); $i++){
				if (!in_array($i, $allIds)){
					return $i;
				}
			}
		}
		return sizeof($allIds)+1;
	}

	public function addToCart(int $id){
		$qty=$_POST["qtyOf".$id];
		$val=$id.",".$qty;
		if (! isset($_COOKIE["cart"]) or empty($_COOKIE["cart"])){
			$cookie=array(
				'name'   => 'cart',
				'value'  => $val,
				'expire' =>  86500,
				'secure' => false
			);
			$this->input->set_cookie($cookie);
		} else {
			$cart=$this->ProductModel->getAllCartArray();
			foreach ($cart as $product){
				if ($product[0]==$id)
				redirect("Home/admin", "refresh");
			}
			$cart_content=$_COOKIE["cart"];
			$val="/".$id.",".$qty;
			$cart_content=$cart_content.$val;
			$cookie=array(
				'name'   => 'cart',
				'value'  => $cart_content,
				'expire' =>  86500,
				'secure' => false
			);
			$this->input->set_cookie($cookie);
		}
		redirect("Home/admin", "refresh");
	}

	public function deleteToCart(int $id){
		$cart=$this->ProductModel->getAllCartArray();
		for ($i=0; $i<sizeOf($cart); $i++){
			if ($cart[$i][0]==$id){
				unset($cart[$i]);
			}
		}
		$final_str="";
		foreach($cart as $pro){
			$str=implode(',',$pro);
			$final_str=$final_str.$str."/";
		}
		$final_str=substr($final_str, 0, -1);
		$cookie=array(
			'name'   => 'cart',
			'value'  => $final_str,
			'expire' =>  86500,
			'secure' => false
		);
		$this->input->set_cookie($cookie);
		redirect("Home/cart", "refresh");
	}

	public function updateCartQty(int $id, int $new_qty){
		$cart=$this->ProductModel->getAllCartArray();
		$index=0;
		for ($i=0; $i<sizeOf($cart); $i++){
			if ($cart[$i][0]==$id){
				unset($cart[$i]);
				$index=$i;
			}
		}
		$final_str="";
		if (empty($cart)){
			$final_str=$id.",".$new_qty;
		}
		else {
			for ($i=0; $i<=sizeOf($cart); $i++){
		 		if ($i==$index){
		 			$str=$id.",".$new_qty."/";
		 			$final_str=$final_str.$str;
		 		} else{
		 			$str=implode(',',$cart[$i]);
		 			$final_str=$final_str.$str."/";
		 		}	
		 	}
		 	$final_str=substr($final_str, 0, -1);
		}
		$cookie=array(
		 	'name'   => 'cart',
		 	'value'  => $final_str,
		 	'expire' =>  86500,
		 	'secure' => false
		);
		$this->input->set_cookie($cookie);
	}

	public function increaseCartQty(int $id, int $previous_qty){
		if ($this->ProductModel->checkCartStock($id, $previous_qty+1))
			$this->updateCartQty($id, $previous_qty+1);
		$this->load->view('cart');
		redirect("Home/cart");
	}

	public function decreaseCartQty(int $id, int $previous_qty){
		if ($previous_qty==1){
			//AJOUTER FENETRE DE COMFIRMATION DE SUPRESSION
			$this->deleteToCart($id);

		} else {
			$this->updateCartQty($id, $previous_qty-1);
			redirect("Home/cart");
		}
		
	}
	
}
