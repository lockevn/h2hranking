<?php           
    class RequestHandler {
        private $_root;
        public function __construct($root) {
            $this->_root = $root;            
        }
        
        public function dispatch() {
            $controller = $_REQUEST["target"];
            if (!isset($controller)) {
                $controller = "Home";
            }
            
            require_once($this->_root . "Controllers/" . $controller . "Controller.class.php");
            
            $action = $_REQUEST["do"];
            if (!isset($action)) {
                $action = "index";    
            } 
            
            try {
                $controllerClass = new ReflectionClass($controller . "Controller");
                $instance = $controllerClass->newInstance($this->_root, $controller);
                $actionMethod = $controllerClass->getMethod($action);
                $actionMethod->invoke($instance);
            }
            catch (Exception $e) {
                
            }
        }    
    }
?>
