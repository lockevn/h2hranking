<?php
    abstract class Controller {
        private $_root;
        private $_name;
        
        public function __construct($root, $name) {
            $this->_root = $root;
            $this->_name = $name;
        }
        
        protected function renderView($view, $data) {
            include($this->_root . "Views/" . $this->_name . "/" . $view . ".php");
        }
        
        protected function home() {
            header("Location: index.php");
        }
        
        protected function accessDenied() {
            echo("Bạn không có quyền sử dụng chức năng này");
        }
        
        protected function returnValue($object) {
            echo($object);
        }
        
        protected function returnJSON($object) {
            echo(json_encode($object));
        }
        
        protected function returnXML($object) {
        }
    }
?>
