<?php 
$errorAccumlator = new ErrorAccumlator();
$command = new Command();
$reportToAcculator = new ReportToErrorAccumlatorWrapper($command,$errorAccumlator);
$reportToAcculator->execute();
if($errorAccumlator->hasAuthFailed()){
    return "loi xac thuc";
}
if($errorAccumlator->hasOptionFailed()){
    return "loi cau hinh";
}
