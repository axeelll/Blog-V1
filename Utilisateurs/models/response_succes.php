<?php


class ResponseSuccess extends Response {
    
   public $objet;
    
    function __construct($success, $message, $objet){

        parent::__construct($success, $messsage);
        $this->objet = $objet;
    
    }
}

?>