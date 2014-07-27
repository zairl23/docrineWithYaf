<?php

class UserController extends Yaf_Controller_Abstract {
	/**
     * init first process
     */
    public function init() {

    	if ($this->getRequest()->isXmlHttpRequest()) {
        	Yaf_Dispatcher::getInstance()->disableView();
    	}
	
		Yaf_Dispatcher::getInstance()->disableView();
	
		$this->db = require_once APPLICATION_PATH . "/conf/db.php";		
    
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
		$query = $this->db->createQuery($dql);
		var_dump($query->getResult());
		//$user = $this->db->find('User', 1);
		//echo $user->getNickname();
	
	}

	public function findAction() 
	{
	
		$uid  = $this->getRequest()->getParam("uid", 1);
		$user = $this->db->find('User', $uid);
        echo $user->getNickname();

	}
}
