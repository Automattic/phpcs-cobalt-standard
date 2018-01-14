<?php

namespace CobaltStandard\Sniffs\Extract;

use CobaltStandard\SniffHelpers;
use PHP_CodeSniffer\Sniffs\Sniff;
use PHP_CodeSniffer\Files\File;

class DisallowExtractSniff implements Sniff {
	public function register() {
		return [T_STRING];
	}

	public function process(File $phpcsFile, $stackPtr) {
		$tokens = $phpcsFile->getTokens();
		$functionName = $tokens[$stackPtr]['content'];
		$helper = new SniffHelpers();
		if ($functionName === 'extract' && $helper->isFunctionCall($phpcsFile, $stackPtr)) {
			$error = 'Extract is not allowed';
			$phpcsFile->addError($error, $stackPtr, 'Extract');
		}
	}
}
