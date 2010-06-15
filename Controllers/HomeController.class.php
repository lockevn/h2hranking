<?php
    require_once("Lib/MessioFramework/Controller.class.php");
    
    class HomeController extends Controller {
        public function index() {
            $this->renderView("index", null);    
        }
    }
?>
