<?php
/**
 * @package   Fuel\Validation
 * @version   2.0
 * @author    Fuel Development Team
 * @license   MIT License
 * @copyright 2010 - 2013 Fuel Development Team
 * @link      http://fuelphp.com
 */

/**
* Provides a simple class with a magic toString method, used for testing objects that can be cast to strings.
*
* @package Fuel\Validation\Rule
* @author  Fuel Development Team
*/
class ClassWithToString
{

	private $returnValue = 0;

	public function __construct($c_returnValue = '1234567890')
	{
		$this->returnValue = $c_returnValue;
	}

	public function __toString()
	{
		return $this->returnValue;
	}

}
