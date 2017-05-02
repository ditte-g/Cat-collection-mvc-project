<?php

class Cat {

	private $id;
	private $name;
	private $birthday;
	private $breed;

	function __construct($id, $name, $birthday, $breed) {
		$this->id = $id;
		$this->name = $name;
		$this->birthday = $birthday;
		$this->breed = $breed;
	}

	// getters (och setters) för alla fyra värden

	   public function getId()
    {
        return $this->id;
    }
	
	public function getName() {
		return $this->name;
	}

	public function setName() {
		return $this->name;
	}

	public function getBirthday() {
		return $this->birthday;
	}

	public function setBirthday() {
		return $this->birthday;
	}

	public function getBreed() {
		return $this->breed;
	}

	public function setBreed() {
		return $this->breed;
	}

}
