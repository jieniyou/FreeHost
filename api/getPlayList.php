<?php

include_once './../controller/PlayListController.php';
use controller\PlayListController;

include_once "./../util/mysqlUtil.php";
require_once "./../util/consoleUtil.php";

$playlistController = new PlayListController();
$playlist = $playlistController->queryAll();
echo json_encode($playlist, JSON_UNESCAPED_UNICODE);