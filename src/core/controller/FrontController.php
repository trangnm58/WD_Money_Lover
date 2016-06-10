<?php
    namespace core\controller;
    require_once 'src/core/controller/Router.php';

    /**
    * FrontController
    * FrontController is used for execute result of rerouting
    */
    class FrontController
    {
        public static function proc()
        {
            // Routing
            $ret = Router::proc();
        
            // Execute the result of rerouting
            $filename = 'src/'.$ret['moduleName'].'/controller/'.$ret['controllerName'].'.php';
            require_once $filename;
            
            $controllerName = $ret['moduleName'].'\\controller\\'.$ret['controllerName'];
            $controller = new $controllerName();
            $controller->$ret['actionName']($ret['parameters']); 
        }
    }
?>