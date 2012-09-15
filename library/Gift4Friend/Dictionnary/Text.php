<?php
class Gift4Friend_Dictionnary_Text extends Gift4Friend_Dictionnary_Abstract{
	
	private $allow_format = array('txt');
	
	public function __construct($options = null){
		parent::__construct($options);
	}
	
	/**
	 * 
	 * @see Gift4Friend_Dictionnary_Abstract::parse()
	 */
	public function parse(SplFileObject $file){
		
		//check format of the file
		if(!$this->isValidFile($file)){
			throw new Gift4Friend_Dictionnary_Exception('Bad format given');
		}
		
		foreach($file as $line){
			parent::addEntry(new Gift4Friend_Dictionnary_Word($line));		
		}
		
		return true;
	}
	
	protected function isValidFile(SplFileObject $file){
		return in_array($file->getExtension(), $this->allow_format);
	}
}