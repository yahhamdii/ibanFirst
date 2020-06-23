<?php

namespace Iban\ApiBundle\Exception;

/**
 *
 * @author hamdi
 */
class EntityNotFoundException extends Exception {
    
    protected $message="Entity not found";
    
    const STATUS_CODE = 404;


    public function __construct(string $message = '') {
        if($message=='')$message= $this->message;
        
        parent::__construct($message, self::STATUS_CODE);
        
    }
    
}
