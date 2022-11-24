<?php
defined('BASEPATH') OR exit('No direct script access allowed');


/**
 * [Description Product]
 */
class Commande extends CI_Controller {

	
	public function __construct(){
		parent::__construct();
		$this->load->helper('url');
		$this->load->helper('file');
		$this->load->helper('cookie');
		$this->load->model('CommandeModel');
		$this->load->model('CommandeEntity');
	}
	
	public function save(){
		$this->CommandeModel->addCommandFromCart();
		redirect($_SESSION["redirect"], "refresh");
	}

	public function displayAllCommands(){
		$allCommands=$this->CommandeModel->getAllCommands();
		var_dump($allCommands);
	}

	public function commandsFromUser(string $login){
		$allCommands=$this->CommandeModel->getAllCommandsFromUser($login);
		var_dump($allCommands);
	}
	
}
