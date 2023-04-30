<?php
/**
 * @return mysqli|void
 */
function getMysqli()
{
    header('Access-Control-Allow-Origin:*');//解决跨域请求问题
    header('Access-Control-Allow-Methods:POST,GET,OPTIONS,DELETE'); // 允许请求的类型
    header('Access-Control-Allow-Headers:x-requested-with, content-type');
    header('Access-Control-Allow-Headers:Content-Type,Content-Length,Accept-Encoding,X-Requested-with,Origin,allowHeaders,Authorization');
    header("content-Type: text/html; charset=utf-8");//字符编码设置

    $REQUEST_METHOD = $_SERVER['REQUEST_METHOD'] ?? "";
    if ($REQUEST_METHOD == 'OPTIONS') {
        die();
    }

//数据库地址
    $servername = "";
//数据库账号
    $username = "";
//数据库密码
    $password = "";
//数据库名
    $dbname = "";

// 创建连接
    $conn = new mysqli($servername, $username, $password, $dbname);
// 检测连接
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    return $conn;
}
/**
 * @param mysqli $conn
 * @param $sql
 * @return array
 */
function getArray(mysqli $conn, $sql): array
{
    $conn->query("SET NAMES 'UTF8'");

    $result = $conn->query($sql);
    $arr = array();
// 输出每行数据
    while ($row = $result->fetch_assoc()) {
        $count = count($row);//不能在循环语句中，由于每次删除row数组长度都减小
        for ($i = 0; $i < $count; $i++) {
            unset($row[$i]);//删除冗余数据
        }
        $arr[] = $row;
    }
    return $arr;
}
/**
 * @param $sql
 * @param mysqli $conn
 * @return array
 */
function getAll($sql, mysqli $conn): array
{
    //设置查询结果的编码,必须放在query之前
    $arr = getArray($conn, $sql);
//print_r($arr);
    $conn->close();
    return $arr;
}

function getOne($sql, mysqli $conn)
{
    //设置查询结果的编码,必须放在query之前
    $arr = getArray($conn, $sql);
//print_r($arr);
    $conn->close();
    return $arr[0];
}

