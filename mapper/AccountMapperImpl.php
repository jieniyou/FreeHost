<?php

namespace mapper;

include "AccountMapper.php";

class AccountMapperImpl implements AccountMapper
{
    public static function login($username, $password): ?array
    {
        $conn = getMysqli();
        $stmt = $conn->prepare('SELECT * FROM account WHERE user_name = ? AND user_password = ?');
        $stmt->bind_param('ss', $username, $password);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows === 0) {
            return null;
        }

        return $result->fetch_assoc();
    }
    public static function register($username, $password, $email): bool
    {
        $conn = getMysqli();

        // 检查用户名是否已存在
        $check_sql = "SELECT user_name FROM account WHERE user_name=?";
        $stmt = $conn->prepare($check_sql);
        $stmt->bind_param("s", $username);
        $stmt->execute();
        $result = $stmt->get_result();
        /**
         * 1.将密码散列化存储是一个基本的安全实践，可以使用 PHP 的 password_hash() 和 password_verify() 函数来完成密码散列化和验证。
         * 2.使用 prepared statement 和参数绑定可以防止 SQL 注入攻击。
         * 3.通过限制查询结果集的数据量，可以有效地阻止被黑客进行数据查询，这可以使用 LIMIT 和 OFFSET 语句来实现。
         * 4.应该检查用户名和电子邮件地址是否符合规范，以避免不规范的输入。
         */
        if ($result->num_rows > 0) {
            return false;
        } else {
            // 插入新的用户数据
            $insert_sql = "INSERT INTO account (user_name, user_password, user_email) VALUES (?, ?, ?)";
            $stmt = $conn->prepare($insert_sql);

            $hashed_password = password_hash($password, PASSWORD_DEFAULT);

            $stmt->bind_param("sss", $username, $hashed_password, $email);
            $stmt->execute();

            return $stmt->affected_rows > 0;
        }
    }
}