<?php

include_once "./../util/mysqlUtil.php";

$conn = getMysqli();
$sql = "SELECT * FROM account";
$arr = getAll($sql, $conn);
echo json_encode($arr, JSON_UNESCAPED_UNICODE);