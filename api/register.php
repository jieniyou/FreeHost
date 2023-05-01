<?php

include_once './../controller/AccountController.php';
use controller\AccountController;

include_once "./../util/mysqlUtil.php";
require_once "./../util/consoleUtil.php";

$username = $_POST['userName'];
$password = $_POST['userPassword'];
$email = $_POST['userEmail'];

$accountController = new AccountController;
$user = $accountController->register($username, $password, $email);
echo json_encode($user, JSON_UNESCAPED_UNICODE);
