<?php

namespace App\Controllers;

use App\Models\Letter;

class LetterController
{
	public function __construct()
	{
		if ($_SERVER["REQUEST_METHOD"] === "GET" && isset($_GET["dni"]))
		{
			$this->show($_GET["dni"]);
		}
	}

	public function show($id) : void
	{
		if (!is_numeric($id))
		{
			echo "Value must contain only numbers";
			return;
		}
		$letter = Letter::find(((int)$id % 23) + 1);
		echo json_encode([
			"id" => $letter->getId() - 1, 
			"letter" => $letter->getLetter()
		]);
	}
}