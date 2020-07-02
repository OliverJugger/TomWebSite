<?php
class DB{

	private $host = 'localhost:3306'; // Attention sur lampp port = 3308
	private $username = 'root'; //username et mot de passe mysql par défaut
	private $password = '';
	private $database = 'photos';
	private $db;

	public function __construct($host = null, $username = null, $password = null, $database = null){
		if($host != null){
			$this->host = $host;
			$this->username = $username;
			$this->password = $password;
			$this->database = $database;
		}

		try{
			$this->db = new PDO('mysql:host='.$this->host.';dbname='.$this->database, $this->username, $this->password, array(
					PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES UTF8',
					PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING
				));
		}catch(PDOException $e){
			die('<h1>Impossible de se connecter a la base de donnee</h1>');
		}


	}

	public function query($sql, $data = array()){
		$req =$this->db->prepare($sql);
		$req->execute($data);
		return $req->fetchAll(PDO::FETCH_OBJ);
	}

	public function queryInsert($sql){
		$req =$this->db->prepare($sql);
		$req->execute();
	}

	function login($email,$password){
		$md5Password = md5($password);
		$query = 'SELECT id,email, first_name, last_name FROM authentification WHERE email="'.$email.'" AND password ="'.$md5Password. '"'; 
        $data = $this->query($query);
        if(count($data)>0){
            $_SESSION['connexion'] = $data[0];
            return true;
        }
            return false;
    }

}