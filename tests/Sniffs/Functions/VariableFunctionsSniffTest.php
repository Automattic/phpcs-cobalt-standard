<?php
declare(strict_types=1);

namespace CobaltStandardTest;

use PHPUnit\Framework\TestCase;

class VariableFunctionsSniffTest extends TestCase {
	public function testVariableFunctionsSniff() {
		$fixtureFile = __DIR__ . '/VariableFunctionFixture.php';
		$sniffFile = __DIR__ . '/../../../CobaltStandard/Sniffs/Functions/VariableFunctionsSniff.php';
		$helper = new SniffTestHelper();
		$phpcsFile = $helper->prepareLocalFileForSniffs($sniffFile, $fixtureFile);
		$phpcsFile->process();
		$lines = $helper->getWarningLineNumbersFromFile($phpcsFile);
		$this->assertEquals([8, 11], $lines);
	}
}
