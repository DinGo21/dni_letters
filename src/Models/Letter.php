<?php

namespace App;

use App\Database;

class Letter
{
	private $db;

	private readonly ?int $id;
	private string        $letter;
	private string        $table;

	public function __construct(string $letter = "", ?int $id = null)
	{
		$this->db = new Database("letters");
		$this->table = "letters";
		$this->id = $id;
		$this->letter = $letter;
	}
}
