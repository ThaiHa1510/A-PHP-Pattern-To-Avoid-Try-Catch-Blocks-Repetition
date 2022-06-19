<?php 
use Command;
use Throwable;

abstract class ErrorHandlerWrapper{
    protected $command;
    protected $errors;
    public function __construct(Command $command)
    {
        $this->command = $command;
    }

    public function execute(){
        try{
            $this->command->execute();
        }
        catch(Throwable $th){
            $this->handleErrors($th);
        }
    }

    abstract function handleErrors(Throwable $e);

    
}