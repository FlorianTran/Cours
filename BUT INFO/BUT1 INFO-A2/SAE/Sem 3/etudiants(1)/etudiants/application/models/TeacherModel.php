<?php

require_once APPPATH . DIRECTORY_SEPARATOR . 'models' . DIRECTORY_SEPARATOR . "TeacherEntity.php";

class TeacherModel extends CI_Model
{
	function findAll():array{
		$this->db->select('*');
		$q = $this->db->get('teacher');
		$response = $q-> custom_result_object("TeacherEntity");
		return $response;
	}

	function findByName($name):?TeacherEntity{
		$this->db->select('*');
		$q = $this->db->get_where('teacher',array('name'=>$name));
		$response = $q->row(0,"TeacherEntity");
		return $response;
	}

	function setGrade(string $name,int $grade){
		$teacher = $this->findByName($name);
		if ($teacher==null)
			return $teacher;
		try {
			$name = $teacher->getName();
			$data = array(
				'name'=> $name,
				'grade'=>$grade);
			$db_debug = $this->db->db_debug;
			$this->db->db_debug = FALSE;
			$this->db->set($data);
			$this->db->where('name',$name);
			$this->db->update('teacher');
			$this->db->db_debug = $db_debug;
		} catch (Exception $e) {

		}
		return $this->findByName($name);
	}

	function increaseGrade(string $name):?TeacherEntity{
		$teacher=$this->findByName($name);
		$teacher->increaseGrade();
		return $teacher;
	}

	function decreaseGrade(string $name):?TeacherEntity{
		$teacher=$this->findByName($name);
		$teacher->decreaseGrade();
		return $teacher;
	}

	function add(TeacherEntity $teacher):?TeacherEntity{
		$name = $teacher->getName();
		$grade = $teacher->getGrade();
		$data = array(
			'name' => $name,
			'grade' => $grade,
		);
		try {
			$db_debug = $this->db->db_debug;
			$this->db->db_debug = FALSE;
			$this->db->insert('teacher', $data);
			$this->db->db_debug = $db_debug;
		} catch (Exception $e) {}
		return $this->findByName($name);
	}

}

