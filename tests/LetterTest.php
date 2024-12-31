<?php declare(strict_types=1);

require ("vendor/autoload.php");

use PHPUnit\Framework\TestCase;
// use SebastianBergmann\CodeCoverage\Filter;
// use SebastianBergmann\CodeCoverage\Driver\Selector;
// use SebastianBergmann\CodeCoverage\CodeCoverage;
// use SebastianBergmann\CodeCoverage\Report\Html\Facade as HtmlReport;

use App\Models\Letter;
use App\Controllers\LetterController;

// $filter = new Filter();
// $filter->includeDirectory('/xampp/htdocs/dni_letters/src/Models');
 
// $coverage = new CodeCoverage(
//     (new Selector)->forLineCoverage($filter),
//     $filter
// );

// $coverage->start('testlul');

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

// $coverage->stop();

// (new HtmlReport)->process($coverage, '/xammp/htdocs/dni_letters/coverage-report');
