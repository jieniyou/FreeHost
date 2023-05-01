<?php
/**
 * @return mysqli|void
 */
include "consoleUtil.php";
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
 * 查询
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
 * 插入
 * @param mysqli $conn
 * @param $sql
 * @return bool|mysqli_result
 */
function insert(mysqli $conn, $sql) : bool
{
    return $conn->query($sql);
}
/**
 * 查询全部
 * @param $sql
 * @param mysqli $conn
 * @return array
 */
function getAll($sql, mysqli $conn): array
{
    $arr = getArray($conn, $sql);
    $conn->close();
    return $arr;
}

/**
 * 单个查询
 * @param $sql
 * @param mysqli $conn
 * @return mixed
 */
function getOne($sql, mysqli $conn)
{
    $arr = getArray($conn, $sql);
    $conn->close();
    return $arr[0];
}

function add($sql, mysqli $conn) : bool
{
    $status = insert($conn, $sql);
    $conn->close();
    return $status;
}

