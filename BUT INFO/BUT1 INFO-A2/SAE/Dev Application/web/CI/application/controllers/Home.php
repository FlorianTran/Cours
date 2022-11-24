<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require_once APPPATH.'controllers'.DIRECTORY_SEPARATOR."Product.php";

class Home extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/userguide3/general/urls.html
	 */
	public function index(){
		$this->load->model('ProductModel');
		$data["allproducts"]=$this->ProductModel->findAll();
		$this->load->view('home', $data);
	}

	public function admin(){
		$this->load->model('UserModel');
		$data["allusers"]=$this->UserModel->findAll();
		$this->load->model('ProductModel');
		$data["allproducts"]=$this->ProductModel->findAll();
		$this->load->model('ProductModel');
		$data["cart"]=$this->ProductModel->getAllCart();
		$this->load->view('admin', $data);
	}

	public function accessDenied(){
		$this->load->view('accessDenied');
	}

	public function cart(){
		$this->load->model('ProductModel');
		$cart=$this->ProductModel->getAllCartArray();
		$allProductsOfCart=array();
		if (! empty($cart)){
			foreach($cart as $product){
		 		$i=intval($product[0]);
		 		// if ($this->ProductModel->checkCartStock($i) == true){
		 		$pro=$this->ProductModel->findById(intval($product[0]));
		 		$qty=$product[1];
		 		$arr=array($pro, $qty);
		 		array_push($allProductsOfCart, $arr);
		 		// }
		 	}
		 }
		 $data["allproducts"]=$allProductsOfCart;
		 $this->load->view('cart', $data);
	}

	






	//--------------------------------------//

}
