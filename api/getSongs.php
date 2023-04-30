<?php

include_once "./../util/mysqlUtil.php";

$conn = getMysqli();
$sql = "SELECT * FROM songs";
$arr = getAll($sql, $conn);
echo json_encode($arr, JSON_UNESCAPED_UNICODE);