<?php

include './../config/CorsConfig.php';
setCorsHeaders();

include_once './../controller/AccountController.php';
use controller\AccountController;

include_once "./../util/mysqlUtil.php";
require_once "./../util/consoleUtil.php";

$method = $_POST['method'];

$username = $_POST['userName'];
$password = $_POST['userPassword'];
$email = $_POST['userEmail'];

$userInfo = [
    'username' => $username,
    'password' => $password,
    'email' => $email
];

$accountController = new AccountController;

function login($accountController, $userInfo)
{
    $user = $accountController->login($userInfo['username'], $userInfo['password']);
    echo json_encode($user, JSON_UNESCAPED_UNICODE);

}

function register($accountController, $userInfo)
{
    $result = $accountController->register($userInfo['username'], $userInfo['password'], $userInfo['email']);
    echo json_encode($result, JSON_UNESCAPED_UNICODE);
}

switch ($method) {
    case 'login':
        login($accountController, $userInfo);
    break;
    case 'register':
        register($accountController, $userInfo);
    break;
}
