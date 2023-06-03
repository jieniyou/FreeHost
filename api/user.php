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

$userId = $_POST['id'];
$userName = $_POST['user_name'];
$userNickname = $_POST['user_nickname'];
$userTel = $_POST['user_tel'];
$userAvatar = $_POST['user_avatar'];
$userEmail = $_POST['user_email'];
$userPassword = $_POST['user_password'];

$PostData = [
    'id' => $userId,
    'username' => $userName,
    'nickname' => $userNickname,
    'tel' => $userTel,
    'avatar' => $userAvatar,
    'email' => $userEmail,
    'password' => $userPassword
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

function listUser($accountController)
{
    $users = $accountController->queryAll();
    echo json_encode($users, JSON_UNESCAPED_UNICODE);
}

function addUser($accountController, $PostData)
{
    $result = $accountController->insert($PostData);
    echo json_encode($result, JSON_UNESCAPED_UNICODE);
}

function editUser($accountController, $PostData)
{
    $result = $accountController->update($PostData);
    echo json_encode($result, JSON_UNESCAPED_UNICODE);
}

function deleteUser($accountController, $PostData)
{
    $result = $accountController->deleteById($PostData['id']);
    echo json_encode($result, JSON_UNESCAPED_UNICODE);
}

switch ($method) {
    case 'login':
        login($accountController, $userInfo);
    break;
    case 'register':
        register($accountController, $userInfo);
    break;
    case 'list':
        listUser($accountController);
    break;
    case 'add':
        addUser($accountController, $PostData);
    break;
    case 'edit':
        editUser($accountController, $PostData);
    break;
    case 'delete':
        deleteUser($accountController, $PostData);
    break;
}
