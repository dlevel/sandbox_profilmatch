<?php
class Gift4Friend_Dictionnary_Word{
	
	/**
	 * 
	 * @var string
	 */
	protected $_label;
	
	/**
	 * 
	 * @param mixed $options
	 */
	public function __construct($options = null){
		if(is_array($options)){
			$this->setOptions($options);
		}else if(is_string($options)){
			$this->setLabel($options);
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
	 * @param string $label
	 */
	public function setLabel($label){
		$this->_label = $label;
	}
	
	/**
	 * 
	 * @return string
	 */
	public function getLabel(){
		return $this->_label;
	}
}