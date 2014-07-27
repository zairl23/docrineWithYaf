<?php

class AgreementController extends Yaf_Controller_Abstract {

	/**
	 * First init
	 *
	 */
	public function init()
	{

		Yaf_Dispatcher::getInstance()->disableView();
	
		$this->db = require_once APPLICATION_PATH . "/conf/db.php";
	
	}

	/**
	 * Report invalid content
	 *
	 * @param  array $input
	 * @return json
	 */ 
	public function indexAction()
	{
		
	}

}