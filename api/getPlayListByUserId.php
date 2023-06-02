<?php

include_once './../controller/PlayListController.php';
use controller\PlayListController;

include_once "./../util/mysqlUtil.php";
require_once "./../util/consoleUtil.php";

$userId = $_POST['userId'];

$playlistController = new PlayListController();
$playlist = $playlistController->queryPlayListByUserId($userId);
echo json_encode($playlist, JSON_UNESCAPED_UNICODE);