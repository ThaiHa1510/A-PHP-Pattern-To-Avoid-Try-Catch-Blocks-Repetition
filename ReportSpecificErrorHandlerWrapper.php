<?php 
use Command;
use Throwable;

class ReportSpecificErrorHandlerWrapper extends ErrorHandlerWrapper{
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

    function handleErrors(Throwable $e){
        if(!isset($this->errors[get_class($e)])){
            $this->errors[]=$e;
            return;
        }
        $this->errors[]=$e;
    }

    public function getErrors(){
        return $this->errors;
    }
    
}
// USAGE //
$errorsToReport = [
    AuthFailedException::class,
    OptionServiceException::class
];
$username = '';
$password = '';

$commandToExecute = new LoginUserCommand($username, $password);
$reportingService = ReportingService::instance();
$commandWithErrorHandling = new ReportSpecificErrorsWrapper($commandToExecute, $reportingService, $errorsToReport);
$commandWithErrorHandling->execute();
$errors = $commandWithErrorHandling->getErrors();
foreach ($this->errorsToReport as $errorClass) {
    if ($error instanceof $class) {
        $this->reportingService->reportError($error);
        break;
    }
}

