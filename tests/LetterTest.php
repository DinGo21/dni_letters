<?php declare(strict_types=1);

require ("vendor/autoload.php");

use PHPUnit\Framework\TestCase;
use App\Models\Letter;
use App\Controllers\LetterController;

class LetterTest extends TestCase
{
	public function test_getData() : void
	{
		$letter = Letter::find(1);

		$this->assertEquals($letter->getLetter(), "T");
		$this->assertEquals($letter->getId(), 1);
	}

	public function test_showValidRequest() : void
	{
		$this->expectOutputString('{"id":1,"letter":"R"}');

		$controller = new LetterController();
		$controller->show("1");
	}

	public function test_showInvalidRequest() : void
	{
		$this->expectOutputString("Value must contain only numbers");

		$controller = new LetterController();
		$controller->show("null");
	}
}
