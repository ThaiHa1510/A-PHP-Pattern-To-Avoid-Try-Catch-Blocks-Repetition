<?php 
use Command;
use Throwable;
use ErrorAccumlator;
class ReportToErrorAccumlatorWrapper extends ErrorHandlerWrapper{

    protected $errorAccumlator;

    public function __construct(Command $command,ErrorAccumlator &$errorAccumlator)
    {
        $this->command = $command;
        $this->errorAccumlator = $errorAccumlator;

    }

    public function handleErrors(Throwable $e)
    {
        $this->errorAccumlator->push($e);
    }

}