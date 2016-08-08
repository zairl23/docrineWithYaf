<?php
class IndexController extends Yaf_Controller_Abstract {
   /* default action */
   public function indexAction() 
   {
        //echo $this->getView()->render(APPLICATION_PATH . "/application/views/index/hello.phtml");
        return $this->getView();
   }

}
