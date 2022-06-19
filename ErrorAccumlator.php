<?
use Command;
use Throwable;
use AuthFailedException;
use OptionsServiceException;

class ErrorAccumlator{
    private $errorsByType = [];

    public function push(Throwable $e)
    {
        if(isset($this->errorsByType[get_class($e)])){
            $this->errorsByType[]=$e;
            return;
        }
        $this->errorsByType[get_class($e)]=$e;
    }

    public function clearAll(){
        $this->errorsByType=[];
    }

    public function hasAuthFailed():bool{
        return $this->isset($this->errorsByType[AuthFailedException::class]);
    }

    public function hasOptionFailed():bool{
        return $this->isset($this->errorsByType[OptionsServiceException::class]);
    }

    


}