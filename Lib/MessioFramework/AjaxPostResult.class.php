<?php
    class AjaxPostResult {
        var $_isSuccess;
        var $_message;
        var $_data;
        
        public function __construct($isSuccess, $message, $data) {
            $this->_isSuccess = $isSuccess;
            $this->_message = $message;
            $this->_data = $data;
        }
    }
?>