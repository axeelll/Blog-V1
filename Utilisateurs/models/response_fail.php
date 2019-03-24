<?php


class ResponseFail extends response {
    
    function __construct($message, $success){
        $this->message = $message;
        $this->success = $success;
    }
}

?>