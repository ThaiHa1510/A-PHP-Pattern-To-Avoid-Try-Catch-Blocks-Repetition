<?php
$username = '';
$password = '';

$errorNotifier = ErrorNotifier::instance();

$commandToExecute = new LoginUserCommand($username, $password);
$commandWithErrorHandling = new ErrorHandlerWithChainWrapper(
    $commandToExecute,
    new AuthErrorHandler(
        new OptionsErrorHandler(new IgnoreErrorHandler(),$user),
        $errorNotifier
    )
);