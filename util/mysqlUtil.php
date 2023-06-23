<?php
include "consoleUtil.php";

/**
 * 获取mysqli连接对象
 * @return mysqli
 */
function getMysqli(): mysqli {
// 设置允许跨域请求的来源、请求方法以及允许的请求头
    header('Access-Control-Allow-Origin: *');
    header('Access-Control-Allow-Methods: POST, GET, OPTIONS, DELETE');
    header('Access-Control-Allow-Headers: Content-Type, Content-Length, Accept-Encoding, X-Requested-With, Origin, allowHeaders, Authorization');

// 设置响应的内容类型为 JSON 格式
    header('Content-Type: application/json; charset=utf-8');

// 设置响应的状态码
    http_response_code(200);

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

    // 设置字符集
    $conn->set_charset('utf8mb4');

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