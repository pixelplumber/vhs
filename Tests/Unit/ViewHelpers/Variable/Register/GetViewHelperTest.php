<?php
namespace FluidTYPO3\Vhs\ViewHelpers\Variable\Register;
/***************************************************************
 *  Copyright notice
 *
 *  (c) 2014 Stefan Neufeind <info (at) speedpartner.de>
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
 * @author Stefan Neufeind <info (at) speedpartner.de>
 * @package Vhs
 */
class GetViewHelperTest extends AbstractViewHelperTest {

	/**
	 * Set up this testcase
	 */
	public function setUp() {
		$GLOBALS['TSFE'] = $this->getMock('TYPO3\\CMS\\Frontend\\Controller\\TypoScriptFrontendController', array(), array(array(), 1, 1));
	}

	/**
	 * @test
	 */
	public function returnsNullIfRegisterDoesNotExist() {
		$name = uniqid();
		$this->assertEquals(NULL, $this->executeViewHelper(array('name' => $name)));
	}

	/**
	 * @test
	 */
	public function returnsValueIfRegisterExists() {
		$name = uniqid();
		$value = uniqid();
		$GLOBALS['TSFE']->register[$name] = $value;
		$this->assertEquals($value, $this->executeViewHelper(array('name' => $name)));
	}

}
