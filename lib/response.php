<?php

class Response
{
	private static $status = array(
		400 => "Bad Request",
		500 => "Internal Server Error"
	);

	public static function fail($code, $message) {
		if (!array_key_exists($code, self::$status))
			$code = 500;
		
		header('HTTP/1.1 ' . $code . ' ' . self::$status[$code]);
		die($message);
	}
	
	public static function json($data)
	{
		header("Content-type: application/json");
		header("Access-Control-Allow-Origin: *");
		echo json_encode($data);
	}
	
	public static function jsonp($jsoncb, $data)
	{
		header("Content-Type: application/javascript; charset=utf-8");
		echo $jsoncb . "(" . json_encode($data) . ")";
	}
}

?>