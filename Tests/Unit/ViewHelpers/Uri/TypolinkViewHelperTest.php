<?php
namespace FluidTYPO3\Vhs\ViewHelpers\Uri;
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
use TYPO3\CMS\Frontend\Controller\TypoScriptFrontendController;

/**
 * @protection on
 * @package Vhs
 */
class TypolinkViewHelperTest extends AbstractViewHelperTest {

	/**
	 * @test
	 */
	public function renderCallsTypoLinkFunctionOnContentObject() {
		$class = $this->getViewHelperClassName();
		$mock = new $class();
		$mock->setArguments(array('configuration' => array('foo' => 'bar')));
		$GLOBALS['TSFE'] = new TypoScriptFrontendController(array(), 1, 0);
		$GLOBALS['TSFE']->cObj = $this->getMock('TYPO3\\CMS\\Frontend\\ContentObject\\ContentObjectRenderer', array('typoLink_URL'));
		$GLOBALS['TSFE']->cObj->expects($this->once())->method('typoLink_URL')->with(array('foo' => 'bar'))->will($this->returnValue('foobar'));
		$result = $this->callInaccessibleMethod($mock, 'render');
		$this->assertEquals('foobar', $result);
	}

}
