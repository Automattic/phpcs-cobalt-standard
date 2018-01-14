<?php
declare(strict_types=1);

namespace CobaltStandardTest;

use PHPUnit\Framework\TestCase;

class DisallowGlobalFunctionsSniffTest extends TestCase {
	public function testDisallowGlobalFunctionsSniff() {
		$fixtureFile = __DIR__ . '/fixture.php';
		$sniffFile = __DIR__ . '/../../../CobaltStandard/Sniffs/Globals/DisallowGlobalFunctionsSniff.php';

		$helper = new SniffTestHelper();
		$phpcsFile = $helper->prepareLocalFileForSniffs($sniffFile, $fixtureFile);
		$phpcsFile->process();
		$lines = $helper->getErrorLineNumbersFromFile($phpcsFile);
		$this->assertEquals([3], $lines);
	}
}
