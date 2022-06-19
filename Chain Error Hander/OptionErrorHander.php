<?php 
use Command;
use Throwable;
use OptionFailedException;
use User;
class OptionErrorHandler extends ErrorHandler{
    protected $user;
    public function __construct(IgnoreErrorHandler $next=null,User $user)
    {
        parent::__construct($next);
        $this->user = $notifier;
    }

    protected function canHandle($err):bool{
        return $err instanceof OptionFailedException::class;
    }

    function performHandling(Throwable $e){
        $this->notifier->notifyAuthFailed($e);
    }

}