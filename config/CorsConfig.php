<?php
// 设置允许跨域访问的头信息
function setCorsHeaders() {
    header('Access-Control-Allow-Origin: *');
    header('Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS');
    header('Access-Control-Max-Age: 3600');
    header('Access-Control-Allow-Headers:Content-Type,Content-Length,Accept-Encoding,X-Requested-with,Origin,allowHeaders,Authorization');
    header("content-Type: text/html; charset=utf-8");
}
