<?php
// 设置允许跨域访问的头信息
function setCorsHeaders() {
// 允许跨域请求的来源、请求方法以及允许的请求头
    header('Access-Control-Allow-Origin: *');
    header('Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS');
    header('Access-Control-Max-Age: 3600');
    header('Access-Control-Allow-Headers: Content-Type, Content-Length, Accept-Encoding, X-Requested-With, Origin, allowHeaders, Authorization');
// 设置响应的内容类型为 JSON 格式
    header('Content-Type: application/json; charset=utf-8');
// 设置响应的状态码
    http_response_code(200);
}
