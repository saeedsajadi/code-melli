<?php

/**
 * In the name of God
 *
 * Validate National Iranian Code
 *
 * @package melliCode
 * @version 1.0.0 mellicode.php Monday, June 15, 2015
 * @author Saeed Sajadi
 * @web http://saeedsajadi.ir
 * @email smart_twists@yahoo.co.uk
 */
namespase code_melli

class Melli_code
{
	/**
	 * Hold National Code
	 *
	 * @access Protected
	 * @var Integer
	 */
	protected static $nationalCode;

	/**
	 * Incorrect List
	 *
	 * @access Protected
	 * @var Integer
	 */
	protected static $notNationalCode = array(
											"1111111111", 
											"2222222222", 
											"3333333333", 
											"4444444444", 
											"5555555555", 
											"6666666666", 
											"7777777777", 
											"8888888888", 
											"9999999999", 
											"0000000000");

	/**
	 * Construct
	 *
	 * @access Public
	 * @var Empty
	 */
	public function __construct()
	{
		
	}

	/**
	 * National Validation Code
	 *
	 * @access Public
	 * @var Integer
	 */
	public function nationalCode($code)
	{
		self::$nationalCode = trim($code);

		if(self::validCode())
		{
			$melliCode = self::$nationalCode;

			$subMid = self::subMidNumbers($melliCode, 10, 1);

			$getNum = 0;

			for($i = 1; $i < 10; $i++)
				$getNum += (self::subMidNumbers($melliCode, $i, 1) * (11 - $i));

			$modulus = ($getNum % 11);

			if((($modulus < 2) && ($subMid == $modulus)) || (($modulus >= 2) && ($subMid == (11 - $modulus))))
				return true;
		}

		return false;
	}

	/**
	 * Validate
	 *
	 * @access Protected
	 * @var Boolean
	 */
	protected function validCode()
	{
		$melliCode = self::$nationalCode;

		if((is_numeric($melliCode)) && (strlen($melliCode) == 10) && (strspn($melliCode, $melliCode[0]) != strlen($melliCode)))
			return true;

		return false;
	}

	/**
	 * Get Portion of String Specified
	 *
	 * @access Protected
	 * @var Integer
	 */
	protected function subMidNumbers($number, $start, $length)
	{
		$number = substr($number, ($start - 1), $length);

		return $number;
	}
}

?>