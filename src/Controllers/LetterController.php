<?php

namespace App\Controllers;

use App\Models\Letter;

class LetterController
{
	public function __construct()
	{
		if (isset($_SERVER["REQUEST_METHOD"]) && $_SERVER["REQUEST_METHOD"] === "GET" && isset($_GET["dni"]))
		{
			$this->show($_GET["dni"]);
		}
	}

	public function show(string $id) : void
	{
		if (!is_numeric($id) || strlen($id) > 8)
		{
			echo "Value is incorrect";
			return;
		}
		$letter = Letter::find(((int)$id % 23) + 1);
		echo json_encode([
			"id" => $letter->getId() - 1, 
			"letter" => $letter->getLetter()
		]);
	}
}