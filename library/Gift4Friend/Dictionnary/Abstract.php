<?php
abstract class Gift4Friend_Dictionnary_Abstract implements Countable{
	
	/**
	 * 
	 * @var SplObjectStorage
	 */
	protected $_dictionnary;
	
	/**
	 * @param mixed $options
	 */
	protected function __construct($options = null){
		$this->_dictionnary = new SplObjectStorage();
		if(is_array($options)){
			$this->setOptions($options);
		}	
	}
	
	/**
	 * 
	 * @param array $options
	 */
	public function setOptions(array $options){
		foreach($options as $key => $option){
			$method_name = 'set' . ucfirst($key);
			if(method_exists($this, $method_name)){
				$this->$method_name($option);
			}
		}
	}
	
	/**
	 * 
	 * @param SplObjectStorage $dictionnary
	 */
	public function setDictionnary(SplObjectStorage $dictionnary){
		$this->_dictionnary = $dictionnary;
	}
	
	/**
	 * 
	 * @return SplObjectStorage
	 */
	public function getDictionnary(){
		return $this->_dictionnary;
	}
	
	/**
	 * @see Countable::count()
	 */
	public function count(){
		return $this->_dictionnary->count();
	}
	
	/**
	 * Add a word to the dictionnary
	 * @param string $word
	 */
	public function addEntry($word){
		$this->_dictionnary->attach($word);
		return $this;
	}
	
	/**
	 * Tell the user if the dictionnary has entry or not
	 * @return boolean
	 */
	public function isEmpty(){
		return $this->_dictionnary->count() > 0;
	}
	
	/**
	 * Remove all entry of the dictionnary
	 */
	public function removeDictionnary(){
		$this->_dictionnary = new SplObjectStorage();
		return $this;
	}
	
	/**
	 * This function parse a file to construct the final
	 * dictionnary of words
	 * 
	 * @param SplFileObject $file
	 * @return this
	 */
	abstract public function parse(SplFileObject $file);
	
	/**
	 * This function tells the user if the file gived in argument
	 * has the format exected or not
	 * 
	 * @param SplFileObject $file
	 * @throws Gift4Friend_Dictionnary_Exception
	 * @return boolean
	 */
	abstract protected function isValidFile(SplFileObject $file);
}