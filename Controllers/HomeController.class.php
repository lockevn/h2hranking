<?php
    require_once("Framework/Controller.class.php");
    
    class HomeController extends Controller {
        public function index() {
            $this->renderView("index", null);    
        }
    }
?>
