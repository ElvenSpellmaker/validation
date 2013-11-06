<?php
/**
 * @package   Fuel\Validation
 * @version   2.0
 * @author    Fuel Development Team
 * @license   MIT License
 * @copyright 2010 - 2013 Fuel Development Team
 * @link      http://fuelphp.com
 */

namespace Fuel\Validation\Rule;

use Fuel\Validation\AbstractRule;

/**
 * Validates that the value of the given field matches the value of another field in the data set.
 *
 * The parameter of this rule should be the name of the field to match against.
 *
 * @package Fuel\Validation\Rule
 * @author  Fuel Development Team
 *
 * @since   2.0
 */
class MatchField extends AbstractRule
{

	/**
	 * @param string $params
	 * @param string $message
	 *
	 * @since 2.0
	 */
	public function __construct($params = null, $message = '')
	{
		parent::__construct($params, $message);

		if ($message == '')
		{
			$this->setMessage('The field does not match the other given field.');
		}
	}


	/**
	 * Returns true if $value matches the value of the field specified with setParameter()
	 *
	 * @param mixed  $value Value to validate
	 * @param string $field Name of the field that is being validated
	 * @param array  $allFields Values of all the other fields being validated
	 *
	 * @return bool
	 *
	 * @since 2.0
	 */
	public function validate($value, $field = null, &$allFields = null)
	{
		$matchAgainst = $this->getParameter();

		// If any of the needed settings are missing, return false
		if (is_null($allFields) or is_null($matchAgainst))
		{
			return false;
		}

		// Check if the array key exists, if not nothing to validate against
		if ( ! array_key_exists($matchAgainst, $allFields))
		{
			return false;
		}

		return $allFields[$matchAgainst] == $value;
	}

}