<?php
namespace MMMOWWW\ClassRealisation;

require_once "interface/IUser.php";

class User implements IUser {
	private $id = 0;
	public function __construct(int $id) {
		$this->id = $id;
	}
	public function getId(): int {
		return $this->id;
	}
};
