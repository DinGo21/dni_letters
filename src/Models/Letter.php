<?php

namespace App\Models;

use App\Database;

class Letter
{
	private $db;

	private readonly ?int $id;
	private string        $letter;

	public function __construct(string $letter = "", ?int $id = null)
	{
		$this->db = new Database();
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
		$db = new Database();
		$query = $db->mysql->query("SELECT * FROM letters WHERE `id` = {$id}");
		$result = $query->fetch_assoc();

		return new Letter($result["letter"], $result["id"]);
	}
};
