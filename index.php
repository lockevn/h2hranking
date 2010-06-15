<?php
    session_start();
    require_once("Framework/RequestHandler.class.php");
    
    $requestHandler = new RequestHandler("");
    $requestHandler->dispatch();
?>
