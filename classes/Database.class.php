<?php
class Database {
	private $db;
	// Store the single instance of Database
	private static $instance;
	
	private $server;
	private $user;
	private $pass;
	private $database;
	
	function __construct($host = NULL, $username = NULL, $passwd = NULL, $dbname = NULL) {
		if (is_null ( $host )) {
			$this->server = DB_SERVER;
		} else {
			$this->server = $host;
		}
		if (is_null ( $username )) {
			$this->user = DB_USER;
		} else {
			$this->user = $username;
		}
		if (is_null ( $passwd )) {
			$this->pass = DB_PASS;
		} else {
			$this->pass = $passwd;
		}
		if (is_null ( $dbname )) {
			$this->database = DB_DATABASE;
		} else {
			$this->database = $dbname;
		}
	}
	
	function connect() {
		$this->db = new PDO ( "mysql:dbname=$this->database;host=$this->server", $this->user, $this->pass );
	}
	
	static function obtain($server = null, $user = null, $pass = null, $database = null) {
		if (!self::$instance) {
			self::$instance = new Database ( $server, $user, $pass, $database );
		}
		
		return self::$instance;
	}
	
	function bind_array_value($req, $array, $type_array = false) {
		$return = '';
		if (is_object ( $req ) && ($req instanceof PDOStatement)) {
			foreach ( $array as $key => $value ) {
				if ($type_array) {
					$req->bindValue ( ":$key", $value, $type_array [$key] );
				} else {
					if (is_int ( $value ))
						$param = PDO::PARAM_INT;
					elseif (is_bool ( $value ))
						$param = PDO::PARAM_BOOL;
					elseif (is_null ( $value ))
						$param = PDO::PARAM_NULL;
					elseif (is_string ( $value ))
						$param = PDO::PARAM_STR;
					else
						$param = PDO::PARAM_STR;
					
					if ($param) {
						$req->bindValue ( ":$key", (string) $value, (string) $param );
						$return .= "[$key] => '".(string) $value."'";
					}
				}
			}
		}
		return $return;
	}
	
	function execute_sql($sql, $params = false, $type_array = false, $return_matrix = false) {
		$action = strtoupper ( substr ( $sql, 0, 4 ) );
		
		$stmt = $this->db->prepare ( $sql );
		if ($params != false) {
			$values_binding = $this->bind_array_value ( $stmt, $params, $type_array );
		}
		
		if ($stmt->execute ()) {
			switch ($action) {
				case 'INSE' :
					$return = $this->db->lastInsertId ( $sql);
					
					if ($return < 1) {
						$this->msg_list->add_error_msg("Failed to insert row. ", __FILE__, __LINE__, __CLASS__, __FUNCTION__ );
					}
					break;
				case 'SELE' :
					$return = $stmt->fetchAll ( PDO::FETCH_ASSOC );
					$rows = count ( $return );
					
					if ($return_matrix) {
						echo "istrinti return_matrix variable, nes nebereikalingas";
					}

					if ($rows == 0) {
						$return = false;
					}	
					break;
				case 'UPDA' :
					$return = $stmt->rowCount ();
					if ($return == 0) {
						$this->msg_list->add_error_msg("Failed to update row(s). ", __FILE__, __LINE__, __CLASS__, __FUNCTION__ );
					}
					break;
				case 'DELE' :
					$return = $stmt->rowCount ();
					if (is_integer ( $return ) && ($return > 0)) {
/*						$msg = new Message ( __FILE__, __LINE__, __CLASS__, __FUNCTION__, "", "", "", $sql  );
						$msg->messageNo = 101;
						$this->msg_list->add_msg ( $msg );*/
					}
					
					break;
				case 'TRUN' :
					$return = 0;
					break;
				case 'SET ' :
					$return = 0;
					break;
				default :
/*					$msg = new Message ( __FILE__, __LINE__, __CLASS__, __FUNCTION__, "", "", "", $sql  );
					$msg->messageNo = 4;
					$this->msg_list->add_msg ( $msg );*/
			}
		} else {
			print_r($stmt->errorInfo ());
/*			$msg = new Message ( __FILE__, __LINE__, __CLASS__, __FUNCTION__ );
			$msg->messageNo = 2;
			$msg->message_mysql = $stmt->errorInfo ();
			$this->msg_list->add_msg ( $msg );*/
		}
		
		unset ( $stmt );
		if (isset ( $return )) {
			return $return;
		}
	}
}