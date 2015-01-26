<?php
namespace FluidTYPO3\Vhs\ViewHelpers\Random;
/***************************************************************
 *  Copyright notice
 *
 *  (c) 2014 Claus Due <claus@namelesscoder.net>
 *
 *  All rights reserved
 *
 *  This script is part of the TYPO3 project. The TYPO3 project is
 *  free software; you can redistribute it and/or modify
 *  it under the terms of the GNU General Public License as published by
 *  the Free Software Foundation; either version 2 of the License, or
 *  (at your option) any later version.
 *
 *  The GNU General Public License can be found at
 *  http://www.gnu.org/copyleft/gpl.html.
 *
 *  This script is distributed in the hope that it will be useful,
 *  but WITHOUT ANY WARRANTY; without even the implied warranty of
 *  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 *  GNU General Public License for more details.
 *
 *  This copyright notice MUST APPEAR in all copies of the script!
 * ************************************************************* */

use FluidTYPO3\Vhs\ViewHelpers\AbstractViewHelperTest;

/**
 * @protection off
 * @author Claus Due <claus@namelesscoder.net>
 * @package Vhs
 */
class StringViewHelperTest extends AbstractViewHelperTest {

	/**
	 * @test
	 */
	public function generatesRandomStringWithDesiredCharactersOnlyAndOfDesiredLength() {
		$arguments = array('minimumLength' => 32, 'maximumLength' => 32, 'characters' => 'abcdef');
		$result = $this->executeViewHelper($arguments);
		$this->assertEquals(32, strlen($result));
		$this->assertEquals(0, preg_match('/[^a-f]+/', $result), 'Random string contained unexpected characters');
	}

}
