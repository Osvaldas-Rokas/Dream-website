<?php
class Article {
	private $db;
	
	private $id_article;
	private $id_user;
	private $name;
	private $text;

    function __construct($id_article) {
    	$this->db = Database::obtain ();
    	 
    	$sql = "SELECT * FROM `".DB_PREFIX."article` WHERE `id_article` = :id_article";
    	$values['id_article'] = $id_article;

    	$result = $this->db->execute_sql($sql, $values);
    	
    	//cia gavus info is DB perkelti info i classe: e.g. $this->name = $result[0]['name'];
    	print_r($result);
    }

    /**
     * Adding article to database
     */
   	public function add() {
		
	}
	
    /**
     * Update article to database
     */
	public function update() {
		
	}
	
	public function setComment() {
	
	}
	
	public function getComments() {
	}
}