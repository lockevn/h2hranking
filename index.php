<?php
    session_start();
    require_once("Lib/MessioFramework/RequestHandler.class.php");
    
    $requestHandler = new RequestHandler("");
    $requestHandler->dispatch();
?>
