<?php 
use Command;
use Throwable;
use AuthFailedException;
class AuthErrorHandler extends ErrorHandler{
    protected $notifier;
    public function __construct(ErrorHandlerWrapper $next=null,ErrorNotifier $notifier)
    {
        parent::__construct($next);
        $this->notifier = $notifier;
    }

    protected function canHandle($err):bool{
        return $err instanceof AuthFailedException::class;
    }

    function performHandling(Throwable $e){
        $this->user->notifyError($e);
    }


}