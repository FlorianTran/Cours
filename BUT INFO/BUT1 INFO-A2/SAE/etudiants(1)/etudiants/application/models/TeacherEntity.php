<?php

class TeacherEntity
{
	private string $name;
	private int $grade;

	/**
	 * @return string
	 */
	public function getName(): string
	{
		return $this->name;
	}

	/**
	 * @return int
	 */
	public function getGrade(): int
	{
		return $this->grade;
	}

	public function increaseGrade(){
		if ($this->grade <20 )
			$this->grade++;
	}

	public function decreaseGrade(){
		if ($this->grade >0 )
			$this->grade--;
	}

	/**
	 * @param string $name
	 */
	public function setName(string $name): void
	{
		$this->name = $name;
	}

	/**
	 * @param int $grade
	 */
	public function setGrade(int $grade): void
	{
		$this->grade = $grade;
	}


}
