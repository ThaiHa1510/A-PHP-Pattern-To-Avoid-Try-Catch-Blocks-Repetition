<?php 
use Command;
use Throwable;

abstract class ErrorHandler{
    protected $next;

    public function __construct(ErrorHandlerWrapper $next=null)
    {
        $this->next = $next;
    }

    abstract function canHandle($err):bool;

    abstract function performHandling(Throwable $e);

    public function handle(Throwable $e){
        if($this->canHandle($err)){
            $this->performHandling($e);
        }
        if($this->next){
            $this->next->handle($e);
        }
    }

}