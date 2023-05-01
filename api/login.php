<?php

include_once './../controller/AccountController.php';
use controller\AccountController;

include_once "./../util/mysqlUtil.php";
require_once "./../util/consoleUtil.php";

$username = $_POST['username'];
$password = $_POST['password'];

$accountController = new AccountController;
$user = $accountController->login($username, $password);
echo json_encode($user, JSON_UNESCAPED_UNICODE);
