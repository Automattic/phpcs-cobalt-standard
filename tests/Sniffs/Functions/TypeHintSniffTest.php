<?php
declare(strict_types=1);

namespace CobaltStandardTest;

use PHPUnit\Framework\TestCase;

class TypeHintSniffTest extends TestCase {
	public function testTypeHintSniff() {
		$fixtureFile = __DIR__ . '/fixture.php';
		$sniffFile = __DIR__ . '/../../../CobaltStandard/Sniffs/Functions/TypeHintSniff.php';

		$helper = new SniffTestHelper();
		$phpcsFile = $helper->prepareLocalFileForSniffs($sniffFile, $fixtureFile);
		$phpcsFile->process();
		$lines = $helper->getWarningLineNumbersFromFile($phpcsFile);
		$this->assertEquals([118, 123, 128, 133, 139, 145, 159], $lines);
	}
}
