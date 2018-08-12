<?php 
namespace Configuracion;
class Connection 
{

	public static $connection;
	function __construct(){


	}

	static public function getConnection(){
        $options = [
            \PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION
    ];
       return new \PDO("mysql:dbname=licoreria;host=localhost", "root", "", $options);

    }




}