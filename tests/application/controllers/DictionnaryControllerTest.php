<?php
class DictionnaryControllerTest extends Zend_Test_PHPUnit_ControllerTestCase{
	private $_dic;
	
 	public function setUp()
    {
        $this->bootstrap = new Zend_Application(APPLICATION_ENV, APPLICATION_PATH . '/configs/application.ini');
        parent::setUp();
        if($this->_dic === null){
       		$this->_dic = new Gift4Friend_Dictionnary_Text();
        }
       	echo 'Debut des tests <br />';
    }
    
    public function testParseNormal(){
    	$this->assertTrue($this->_dic->parse(new SplFileObject(APPLICATION_PATH . '/../public/liste_francais.txt')));
    }
    
    public function testParseBadFormatException(){
    	try{
    		$this->assertTrue($this->_dic->parse(new SplFileObject(APPLICATION_PATH . '/../tests/files/PastedGraphic-1.jpg')));
    		$this->assertFalse(false);
    	}catch (Gift4Friend_Dictionnary_Exception $e){
    		$this->assertTrue(true);
    	}
    }
    public function tearDown(){
    	echo 'fin tests <br />';
    	$this->_dic->removeDictionnary();
    }
}