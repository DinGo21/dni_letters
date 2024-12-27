<?php

namespace App;

use mysqli;
use mysqli_sql_exception;

class Database
{
	public $mysql;

	private string $servername;
	private string $username;
	private string $password;
	private string $database;

	public function __construct(string $servername = "localhost", string $username = "root", string $password = "",
								string $database = "")
	{
		$this->servername = $servername;
		$this->username = $username;
		$this->password = $password;
		$this->database = $database;

		$this->connect();
	}

	public function connect() : void
	{
		$this->mysql = new mysqli($this->servername, $this->username, $this->password, $this->database);

		if ($this->mysql->connect_error)
		{
			die("Connection failed: " . $this->mysql->connect_error);
		}
	}
}