<?php
/* bootstrap class should be defined under ./application/Bootstrap.php */
//use Doctrine\ORM\Tools\Setup;
//use Doctrine\ORM\EntityManager;

class Bootstrap extends Yaf_Bootstrap_Abstract {

   /**
     *
     * @var \Yaf\Config\Ini
     */
    protected $_config;

    /**
     * Load config file
     */
    protected function _initConfig()
    {
        $config = Yaf_Application::app()->getConfig();

        Yaf_Registry::set("Config", $config);

        $this->_config = $config;
    }

    /*
    * initIncludePath is only required because zend components have a shit load of
    * include_once calls everywhere. Other libraries could probably just use
    * the autoloader (see _initNamespaces below).
    */
    // protected function _initIncludePath()
    // {
    //     // Ensure library/ is on include_path
    //     set_include_path(
    //         implode(
    //             PATH_SEPARATOR,
    //             array(
    //                 $this->_config->application->library,
    //                 get_include_path(),
    //             )
    //         )
    //     );
    // }

    // /**
    //  * Init namespaces
    //  */
    // protected function _initNamespaces()
    // {
    //     $namespaces = $this->_config->application->namespaces->toArray();

    //     Yaf_Loader::getInstance()->registerLocalNameSpace($namespaces);
    // }

    /**
     * @param \Yaf\Dispatcher $dispatcher
     * @return \Yaf\Router
     */
    protected function _initRoute(Yaf_Dispatcher $dispatcher)
    {
        if (Yaf_Registry::get("Config")->routes) {
            $router = $dispatcher->getRouter();
            $router->addConfig(Yaf_Registry::get("Config")->routes);

            return $router;
        }
    }

 /**
     * Init Doctrine
     *
     */
    // protected function _initDoctrine()
    // {
    //     $classLoader = new Doctrine\Common\ClassLoader('Doctrine');
    //     $classLoader->register();

    //     $classLoader = new Doctrine\Common\ClassLoader('Symfony');
    //     $classLoader->register();

    //     $cache = new Doctrine\Common\Cache\ArrayCache;

    //     $config = new Doctrine\ORM\Configuration;
    //     //$config->setMetadataCacheImpl($cache);

    //     //$path       = APPLICATION_PATH . '/entities/metadata';
    //     //$driverImpl = new Doctrine\ORM\Mapping\Driver\YamlDriver($path);;

    //     //$config->setMetadataDriverImpl($driverImpl);
    //     //$config->setQueryCacheImpl($cache);
    //     //$config->setProxyDir(sys_get_temp_dir());
    //     //$config->setAutoGenerateProxyClasses(true);

    //     // database configuration parameters
    //     $connOptions = $this->_config->db->toArray();
    //     $conn = array(
    //         'driver'    => $connOptions['adapter'],
    //         'host'      => $connOptions['params']['host'],
    //         'user'      => $connOptions['params']['user'],
    //         'password'  => $connOptions['params']['password'],
    //         'dbname'    => $connOptions['params']['dbname']
    //     );

    //     $paths     = array(APPLICATION_PATH . "/models/*");
    //     $isDevMode = false;

    //     $config = \Doctrine\ORM\Tools\Setup::createAnnotationMetadataConfiguration($paths, $isDevMode);
    //     // obtaining the entity manager
    //     $entityManager = \Doctrine\ORM\EntityManager::create($conn, $config);

    //     Yaf_Registry::set('EntityManager', $entityManager);
    // }

    public function _initDocrine()
    {
        $paths     = array(APPLICATION_PATH . "/application/modules/library/*");
        $isDevMode = false;

        // the connection configuration
        $connOptions = $this->_config->db->toArray();
        $conn = array(
                'driver'    => $connOptions['adapter'],
                'host'      => $connOptions['params']['host'],
                'user'      => $connOptions['params']['user'],
                'password'  => $connOptions['params']['password'],
                'dbname'    => $connOptions['params']['dbname']
        );

        $config = \Doctrine\ORM\Tools\Setup::createAnnotationMetadataConfiguration($paths, $isDevMode);
        $entityManager = \Doctrine\ORM\EntityManager::create($conn, $config);
        Yaf_Registry::set('EntityManager', $entityManager);
    }

    
}
