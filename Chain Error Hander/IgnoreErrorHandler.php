<?php 
use Command;
use Throwable;
use User;
class IgnoreErrorHandler extends ErrorHandler{
    protected $user;
    public function __construct(IgnoreErrorHandler $next=null,User $user)
    {
        parent::__construct($next);
        $this->user = $notifier;
    }

    protected function canHandle($err):bool{
        return true;
    }

    function performHandling(Throwable $e){
       //nothing
    }

}