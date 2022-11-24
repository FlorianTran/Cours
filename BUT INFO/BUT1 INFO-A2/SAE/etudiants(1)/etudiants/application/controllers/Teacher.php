<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Teacher extends CI_Controller {


	public function __construct(){
		parent::__construct();
		//Si besoin por debuguer
		$this->output->enable_profiler(TRUE);
		$this->load->helper('url');
		$this->load->model('TeacherModel');
	}

	public function index()
	{
		$teacher = $this->TeacherModel->findAll();
		$data = array("teacher"=>$teacher);
		$this->load->view('grades',$data);
	}

	public function increase($name)
	{
		$teacher= $this->TeacherModel->increaseGrade($name);
		$this->TeacherModel->setGrade($teacher->getName(),$teacher->getGrade());
		redirect('Teacher');
	}
	public function decrease($name)
	{
		$teacher= $this->TeacherModel->decreaseGrade($name);
		$this->TeacherModel->setGrade($teacher->getName(),$teacher->getGrade());
		redirect('Teacher');
	}

	public function add(){
		$teacher = new TeacherEntity();
		$teacher->setName($this->input->post('name'));
		$teacher->setGrade($this->input->post('grade'));
		$teacher = $this->TeacherModel->add($teacher);
		redirect('Teacher');

	}

}
