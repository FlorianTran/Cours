<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

	public function login(){	
		$this->load->view('login');
	}

	public function loginCheck(){
		$pseudo = $_POST['login'];
        $password = $_POST ['password'];
        $this->load->model('UserModel');
        $user = $this->UserModel->findByPseudo($pseudo);
        if ($user !=null && $user->isValidPassword($password)) {
            session_start();
            $_SESSION['login']=array("pseudo"=>$user->getPseudo(), "status"=>$user->getStatus());
            $this->load->helper("url");
            redirect(base_url(), 'refresh');
            die();
        }
        $this->load->view("accessDenied");
	}

	public function signin(){	
		$this->load->view('signin');
	}

	public function signinCheck(){
		$pseudo = $_POST['login'];
        $password = $_POST ['password'];
        $cpassword = $_POST ['confpassword'];
        $this->load->model('UserModel');
        $user = $this->UserModel->findByPseudo($pseudo);
        if ($user == null && $password==$cpassword) {
			$this->UserModel->add($pseudo, $password, "Visitor");
			$user = $this->UserModel->findByPseudo($pseudo);
			session_start();
            $_SESSION['login']=array("pseudo"=>$user->getPseudo(), "status"=>$user->getStatus());
            $this->load->helper("url");
            redirect(base_url(), 'refresh');
            die();
        }
		$this->load->view('signin');
	}

	public function logout(){
        session_start();
        session_destroy();
        $this->load->helper("url");
		redirect(base_url(), 'refresh');
	}

    public function display(string $pseudo){
		if($pseudo=='null'){
			$this->load->helper("url");
			redirect('User/login', 'refresh');
			die();
		}
        $data['pseudo']=$pseudo;
		$this->load->model('UserEntity');
		$this->load->model('UserModel');
		$user=$this->UserModel->findByPseudo($pseudo);
		$data['password']=$user->getPassword();
		$data['status']=$user->getStatus();
		$this->load->view('User', $data);
    }

    public function delete(string $pseudo){
		$this->load->model('UserModel');
		$this->UserModel->delete($pseudo);
		$data['allusers']=$this->UserModel->findAll();
		$this->load->helper("url");
		redirect(base_url().'index.php/Home/admin', 'refresh');
	}

    public function update(string $pseudo){
		$data["pseudo"]=$pseudo;
		$this->load->model('UserModel');
		$this->load->model('UserEntity');
		$user=$this->UserModel->findByPseudo($pseudo);
		$data["password"]=$user->getPassword();
		$data["status"]=$user->getStatus();
		$this->load->view('updateUser', $data);
	}

    public function updateUser(){
		$pseudo= $_POST['pseudo'];
		$password = $_POST['password'];
		$status= $_POST['status'];
		$this->load->model('UserModel');
		$this->UserModel->update($pseudo, $password, $status);
		$data['allusers']=$this->UserModel->findAll();
		$this->load->helper("url");
		redirect(base_url().'index.php/Home/admin', 'refresh');
	}

	public function add(){
		$this->load->view('addUser');
	}

	public function addUser(){
		$pseudo= $_POST['pseudo'];
		$password = $_POST['password'];
		$status= $_POST['status'];
		$this->load->model('UserModel');
		$this->UserModel->add($pseudo, $password, $status);
		$data['allusers']=$this->UserModel->findAll();
		$this->load->helper("url");
		redirect(base_url().'index.php/Home/admin', 'refresh');
	}
}
