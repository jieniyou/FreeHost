<?php
include "consoleUtil.php";

/**
 * 获取mysqli连接对象
 * @return mysqli
 */
function getMysqli(): mysqli {
    header('Access-Control-Allow-Origin:*');
    header('Access-Control-Allow-Methods:POST,GET,OPTIONS,DELETE');
    header('Access-Control-Allow-Headers:x-requested-with, content-type');
    header('Access-Control-Allow-Headers:Content-Type,Content-Length,Accept-Encoding,X-Requested-with,Origin,allowHeaders,Authorization');
    header("content-Type: text/html; charset=utf-8");

    $REQUEST_METHOD = $_SERVER['REQUEST_METHOD'] ?? "";

    if ($REQUEST_METHOD == 'OPTIONS') {
        die();
    }

    // 数据库地址
    $servername = "";
    // 数据库账号
    $username = "";
    // 数据库密码
    $password = "";
    // 数据库名
    $dbname = "";

    // 创建mysqli连接
    $conn = new mysqli($servername, $username, $password, $dbname);

    // 检测连接
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    return $conn;
}

/**
 * 执行查询操作并返回结果数组
 *
 * @param mysqli $conn mysqli连接对象
 * @param string $sql 要执行的查询语句
 * @return array 结果数组
 */
function getArray(mysqli $conn, string $sql): array {
    $conn->query("SET NAMES 'UTF8'");
    $result = $conn->query($sql);
    $arr = array();

    // 遍历查询结果集，生成结果数组
    while ($row = $result->fetch_assoc()) {
        // 删除冗余数据，避免数组中有多余字段
        $count = count($row);
        for ($i = 0; $i < $count; $i++) {
            unset($row[$i]);
        }
        $arr[] = $row;
    }

    return $arr;
}

/**
 * 执行插入操作
 *
 * @param mysqli $conn mysqli连接对象
 * @param string $sql 要执行的插入语句
 * @return bool 是否成功执行插入操作
 */
function insert(mysqli $conn, string $sql) : bool {
    return $conn->query($sql);
}

/**
 * 执行并返回查询结果数组
 *
 * @param string $sql 要执行的查询语句
 * @param mysqli $conn mysqli连接对象
 * @return array 查询结果数组
 */
function getAll(string $sql, mysqli $conn): array {
    $arr = getArray($conn, $sql);
    $conn->close();
    return $arr;
}

/**
 * 执行单个查询操作并返回结果
 *
 * @param string $sql 要执行的查询语句
 * @param mysqli $conn mysqli连接对象
 * @return mixed 查询结果
 */
function getOne(string $sql, mysqli $conn) {
    $arr = getArray($conn, $sql);
    $conn->close();
    return $arr[0];
}

/**
 * 执行插入操作
 *
 * @param string $sql 要执行的插入语句
 * @param mysqli $conn mysqli连接对象
 * @return bool 是否成功执行插入操作
 */
function add(string $sql, mysqli $conn) : bool {
    $status = insert($conn, $sql);
    $conn->close();
    return $status;
}