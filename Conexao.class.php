<?php

class Conexao{

	private static $instance;

	public function Conexao()
	{
	}

	public static function getInstace()
	{
		if(! isset ( self::$instance )) {


			try {
				self::$instance = mysqli_connect('localhost', 'root', '', 'Fido');
				mysqli_set_charset(self::$instance,"utf8");
				
			} catch (Exception $e) {
				print_r($e);
			}

			return self::$instance;
		}

	}

}