<?php
/* bootstrap class should be defined under ./application/Bootstrap.php */
use Doctrine\ORM\Tools\Setup;
use Doctrine\ORM\EntityManager;

class Bootstrap extends Yaf_Bootstrap_Abstract {
	public function _initConfig(Yaf_Dispatcher $dispatcher) {
           // var_dump(__METHOD__);
        }
        public function _initPlugin(Yaf_Dispatcher $dispatcher) {
            //var_dump(__METHOD__);
        }

	public function _initDocrine(Yaf_Dispatcher $dispatcher) {
		$paths = array(APPLICATION_PATH . "application/modules/models/");
		$isDevMode = false;

		// the connection configuration
		$dbParams = array(
    			'driver'   => 'pdo_mysql',
    			'user'     => 'root',
    			'password' => '',
    			'dbname'   => 'miaoone',
		);

		$config        = Setup::createAnnotationMetadataConfiguration($paths, $isDevMode);
		$entityManager = EntityManager::create($dbParams, $config);
	}
}
