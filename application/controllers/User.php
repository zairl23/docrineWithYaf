<?php

class UserController extends Yaf_Controller_Abstract {
	
	/**
	 * Docrine ORM instance
	 */
	protected $em;

	/**
     * init first process
     */
    public function init() {

    	if ($this->getRequest()->isXmlHttpRequest()) {
        	Yaf_Dispatcher::getInstance()->disableView();
    	}
	
		Yaf_Dispatcher::getInstance()->disableView();
	
		//$this->db = require_once APPLICATION_PATH . "/conf/db.php";	
		$this->em = Yaf_Registry::get('EntityManager');	
    
    }

   	public function indexAction() 
   	{
	
		Yaf_Dispatcher::getInstance()->disableView();
	 	echo "hello world";
  	
  	}
	
	public function listAction() 
	{
	
		Yaf_Dispatcher::getInstance()->disableView();
		//echo "users list";
		$dql = "SELECT u FROM User u";
		$query = $this->em->createQuery($dql);
		var_dump($query->getResult());
		//$user = $this->em->find('User', 1);
		//echo $user->getNickname();
	
	}

	public function findAction() 
	{
	
		$uid  = $this->getRequest()->getParam("uid", 1);
		$user = $this->db->find('User', $uid);
        echo $user->getNickname();

	}

    public function findOneAction() {
        $dql = "SELECT u FROM User u";
        $query =  $this->em->createQuery($dql);
        //$query = Yaf_Registry::get('EntityManager')->find('User', 1);
        var_dump($query->getResult());
        
    }
}
