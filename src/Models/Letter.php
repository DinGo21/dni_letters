<?php

namespace App;

use App\Database;

class Letter
{
	private $db;

	private readonly ?int $id;
	private string        $letter;

	public function __construct(string $letter = "", ?int $id = null)
	{
		$this->db = new Database("letters");
		$this->id = $id;
		$this->letter = $letter;
	}

	public function getId() : int
	{
		return $this->id;
	}

	public function getLetter() : string
	{
		return $this->letter;
	}

	public static function find(int $id) : Letter
	{
		$db = new Database("letters");
		$query = $db->mysql->query("SELECT * FROM letters WHERE `id` = {$id}");
		$result = $query->fetchAll();

		return new Letter($result[0]["letter"], $result[0]["id"]);
	}
};
