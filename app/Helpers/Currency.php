<?php

namespace App\Helpers;

class Currency
{
	public static function unformat($val)
	{
        $res = preg_replace('/\D/','',$val);
		
		return $res;
	}

	public static function idr_format($val)
	{
		return "Rp" . number_format($val, 0, ',', '.');
	}
}