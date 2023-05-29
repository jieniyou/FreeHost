<?php

include_once './../controller/AccountController.php';
use controller\AccountController;

include_once "./../util/mysqlUtil.php";
require_once "./../util/consoleUtil.php";

$username = $_POST['userName'];
$password = $_POST['userPassword'];
$email = $_POST['userEmail'];

$accountController = new AccountController;
$result = $accountController->register($username, $password, $email);
echo json_encode($result, JSON_UNESCAPED_UNICODE);
