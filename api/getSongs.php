<?php

include_once './../controller/SongsController.php';
use controller\SongsController;

include_once "./../util/mysqlUtil.php";
require_once "./../util/consoleUtil.php";

$songsController = new SongsController();
$songs = $songsController->queryAll();
echo json_encode($songs, JSON_UNESCAPED_UNICODE);