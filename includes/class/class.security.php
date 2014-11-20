<?php
namespace System;
class security
{
    public function clear_input($input) {
        $input = strip_tags($input);
        $input = trim($input);        
        for($a = 0; $a <= 47; $a++ ) {
            if($a!="32" && $a!="45") {
                $banned_char = chr($a);
                $input = str_replace($banned_char,'',$input);
            }
        }
        for($b = 58; $b <= 64; $b++ ) {
            $banned_char = chr($b);
            $input = str_replace($banned_char,'',$input);
        }
        for($c = 91; $c <= 96; $c++ ) {
            $banned_char = chr($c);
            $input = str_replace($banned_char,'',$input);
        }
        for($d = 123; $d <= 255; $d++ ) {
            $banned_char = chr($d);
            $input = str_replace($banned_char,'',$input);
        }
        return $input;
    }
	public static function globalStripSlashes()
	{

		if (get_magic_quotes_gpc() == 1)
		{
			$_GET = array_map(array ('self', 'recursiveStripSlashes'), $_GET);
			$_POST = array_map(array ('self', 'recursiveStripSlashes'), $_POST);
			$_COOKIE = array_map(array ('self', 'recursiveStripSlashes'), $_COOKIE);
		}

	}
	private static function recursiveStripSlashes($value)
	{
		if (is_array($value))
		{
			return array_map(array ('self', 'recursiveStripSlashes'), $value);
		}
		else
		{
			return stripslashes($value);
		}
	}
}






?>