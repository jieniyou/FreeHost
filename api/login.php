<?php

include_once './../controller/AccountController.php';
use controller\AccountController;

include_once "./../util/mysqlUtil.php";
require_once "./../util/consoleUtil.php";

$username = $_POST['userName'];
$password = $_POST['userPassword'];

$accountController = new AccountController;
$user = $accountController->login($username, $password);
echo json_encode($user, JSON_UNESCAPED_UNICODE);
