<?php

include_once './../controller/SongsController.php';
use controller\SongsController;

include_once "./../util/mysqlUtil.php";
require_once "./../util/consoleUtil.php";

$id = $_POST['id'];

$songsController = new SongsController();
$result = $songsController->deleteById($id);
echo json_encode($result, JSON_UNESCAPED_UNICODE);
