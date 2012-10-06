<?php
class Goal {
	private $id_goal;
	private $id_goal_parent;
	private $id_user;
	private $name;
	private $deadline;
	
	
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
}