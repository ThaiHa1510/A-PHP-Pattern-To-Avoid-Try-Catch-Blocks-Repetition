<?php
use ErrorHandlerWrapper;
use Command;
class ErrorHandlerWithChainWrapper extends ErrorHandlerWrapper{
    protected $errorHandler;
    public function __construct(Command $command,ErrorHandler $errorHandler)
    {
        parent::__construct($command);
        $this->errorHandler = $errorHandler;
    }

    public function handleErrors(Throwable $e)
    {
        $this->errorHandler->handle($e)
    }
}