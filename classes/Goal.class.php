<?php
class Goal {
	private $id_goal;
	private $goal_parent;
	private $user;
	private $name;
	private $deadline;
	
	
	function __construct() {
		
	}
	
	/**
	 * Adding goal.
	 * @return boolean or array of error message
	 */
	public function add () {
		
	}
	
	/**
	 * Update goal
	 * @return boolean or array of error message
	 */
	public function update () {
		
	}
	
	/**
	 * Settings keywords for goal
	 * @param string/array $keywords
	 * @return boolean or array of error messages
	 */
	public function setKeywords($keywords) {
		
	}
	
	/**
	 * Get keywords
	 * @return array of keywords
	 */
	public function getKeywords() {
		
	}
	
	/**
	 * Get suggestion from keyword given
	 * @param string $keyword
	 */
	public function getKeywordSuggestion($keyword) {
		
	}
	
	/**
	 * Get all goal suggestions as array
	 * @return Goal suggestion array
	 */
	public function getGoalSuggestion() {
		//implementuot naudojant sitos classes functions "getkeywords" ir "getKeywordSuggestion($keyword)"
	}
	
	public function addNote() {
		
	}
	
	public function updateNote() {
		
	}
	
	public function getNotes() {
		
	}
	
	public function setRespect() {
		
	}
	
	public function getRespects() {
		// grazinti sukuriant nauja objecta. e.g. return
	}
}