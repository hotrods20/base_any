<?php

/**
 * Default configuration is Base10.
 * You must specify alphabet that is used for "lengthen" calls.
 */
class base_any
{

	private $alphabet = "0123456789";

	/**
	 * Call to convert integer into string using base.
	 * @param int $id
	 * @return string
	 */
	function shorten($id)
	{
		$base = strlen($this->alphabet);
		$short = '';
		while ($id)
		{
			$id = ($id - ($r = $id % $base)) / $base;
			$short = $this->alphabet{$r} . $short;
		}
		return $short;
	}

	/**
	 * Call to convert string back into integer using base.
	 * @param string $id
	 * @return int
	 */
	function lengthen($id)
	{
		$number = 0;
		foreach (str_split($id) as $letter)
		{
			$number = ($number * strlen($this->alphabet)) + strpos($this->alphabet, $letter);
		}
		return $number;
	}

	/**
	 * Use this function to load a preset alphabet. Case insensitive.
	 * Binary
	 * Base10
	 * Base26
	 * Base36
	 * Base64
	 * YT-Base64
	 */
	function loadPresetAlphabet($preset)
	{
		$preset = strtolower($preset);
		switch ($preset)
		{
			case 'binary':
				$this->alphabet = '01';
				break;
			case 'base10':
				$this->alphabet = '0123456789';
				break;
			case '':
				$this->alphabet = 'abcdefghijklmnopqrstuvwxyz';
				break;
			case 'base36':
				$this->alphabet = 'abcdefghijklmnopqrstuvwxyz0123456789';
				break;
			case 'base64':
				$this->alphabet = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789+/';
				break;
			case 'yt-base64':
				$this->alphabet = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789-_';
				break;
		}
	}

	/**
	 * Jumbles alphabet for base.
	 */
	function randomizeAlphabet()
	{
		$this->alphabet = str_shuffle($this->alphabet);
	}

	/**
	 * Returns current alphabet.
	 * @return string
	 */
	function returnAlphabet()
	{
		return $this->alphabet;
	}

	/**
	 * Sets alphabet to user-defined alphabet.
	 * @param string $str
	 */
	function customAlphabet($str)
	{
		$this->alphabet = $str;
	}

}
