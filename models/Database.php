<?php
	class Database{
		private $database;
		private $host;
		private $username;
		private $password;
		private $mysqli;
		function __construct()
		{
			$this->host       =		"localhost";
			$this->username   =		"root";
			$this->password   =		'';
			$this->database 	=		"pizzeria";
			$this->mysqli     =		null;
		}

		public function connect()
		{
			$this->mysqli = new mysqli($this->host, $this->username, $this->password, $this->database);
			if ($this->mysqli->connect_errno) {
				$mensaje .="Error with MySQL connection. \n";
				$mensaje .= "Errno: " . $this->mysqli->connect_errno . "\n";
				exit(json_encode(array('err' => $mensaje)));
			}
			$this->mysqli->set_charset("utf8");

			return true;

		}
		function __destruct()
		{
			if($this->mysqli)$this->mysqli->close();
		}
		function query($sql){
			$this->connect();
			//$sql = eregi_replace("[\n|\r|\n\r]", ' ', $sql);
			//$sql = $this->mysqli->real_escape_string($sql);
			if (!$query =$this->mysqli->query($sql)) {
				$mensaje .="Error with MySQL connection. \n";
				$mensaje .= "Errno: " . $this->mysqli->error . "\n";

			    //exit(json_encode(array('err' => $mensaje)));
			    return false;
			}else {
				if ($query===true) {
					return true;
				}else{
					$rows = array();
					while($row = $query->fetch_assoc())
					{
						$rows[] = $row;
					}
					return $rows;
				}
			}
		}
		public function close()
		{
			if ($this->mysqli) {
				mysql_close($this->mysqli);
			}

		}
	}
