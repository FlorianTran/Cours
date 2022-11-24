<?php
  
   class Upload extends CI_Controller {
	
      public function __construct() { 
         parent::__construct(); 
         $this->load->helper(array('form', 'url')); 
         $this->load->library('session');
      }
		
      public function index() { 
         $this->load->view('upload_form', array('error' => ' ' )); 
      } 
		
      public function product_upload() { 
         $config['upload_path']   = 'public/img/products/'; 
         $config['allowed_types'] = 'gif|jpg|png';  
         $config['encrypt_name']=FALSE;
         //SE CONCERTER PAR RAPPORT A LA NECESSITE D'ENCRYPTER LE NOM DES IMAGES
         $this->load->library('upload', $config);

         if ( ! $this->upload->do_upload('userfile')) {
            $data["upload_error"]=$this->upload->display_errors(); 
            $this->load->view('addProduct', $data); 
         } else {
            $d=$this->upload->data();
            redirect('Home/admin', 'refresh');
         } 
      } 
   } 
?>