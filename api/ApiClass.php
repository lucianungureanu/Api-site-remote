<?php
/**
* 
*/
include('config.php');
class Api
{
	public $response;
	
	function __construct($data)
	{
		$url = APP_URL;
		$myvars = 'app_key='.APP_KEY;

		$myvars .= '&'.http_build_query($data);


		$ch = curl_init( $url );
		curl_setopt( $ch, CURLOPT_POST, 1);
		curl_setopt( $ch, CURLOPT_POSTFIELDS, $myvars);
		curl_setopt( $ch, CURLOPT_FOLLOWLOCATION, 1);
		curl_setopt( $ch, CURLOPT_HEADER, 0);
		curl_setopt( $ch, CURLOPT_RETURNTRANSFER, 1);
		 
		$this->response = curl_exec( $ch );

	}

}

?>