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

        $stmt->close();

        if ($result->num_rows === 0) return null;

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
        $stmt->close();
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

            $stmt->bind_param("sss", $username, $password, $email);
            $stmt->execute();

            $results = $stmt->affected_rows;
            $stmt->close();

            return $results > 0;
        }
    }

    public static function queryAll(): ?array
    {
        // TODO: Implement queryAll() method.
        $conn = getMysqli();
        $sql = "SELECT * FROM account";
        $stmt = $conn->prepare($sql);
        $stmt->execute();

        $result = $stmt->get_result();
        $stmt->close();

        if ($result->num_rows === 0) return null;

        $data = [];
        while ($row = $result->fetch_assoc()) {
            $data[] = $row;
        }
        return $data;
    }
    // id
    // username
    // nickname
    // tel
    // avatar
    // email
    // password
    public static function insert($PostData): bool
    {
        // TODO: Implement insert() method.
        $conn = getMysqli();

        // 检查用户名是否已存在
        $check_sql = "SELECT user_name FROM account WHERE user_name=?";
        $stmt = $conn->prepare($check_sql);
        $stmt->bind_param("s", $PostData['username']);
        $stmt->execute();
        $result = $stmt->get_result();
        $stmt->close();
        if ($result->num_rows > 0) {
            return false;
        } else {
            // 插入新的用户数据
            $insert_sql = "INSERT INTO account (user_avatar, user_email, user_name, user_nickname, user_tel) VALUES (?, ?, ?, ?, ?)";
            $stmt = $conn->prepare($insert_sql);
            $stmt->bind_param("sssss", $PostData['avatar'], $PostData['email'], $PostData['username'], $PostData['nickname'], $PostData['tel']);
            $stmt->execute();

            $results = $stmt->affected_rows;
            $stmt->close();

            return $results > 0;
        }
    }

    // id
    // username
    // nickname
    // tel
    // avatar
    // email
    // password

    public static function update($PostData): bool
    {
        // TODO: Implement update() method.
        $id = $PostData['id'];
        $username = $PostData['username'];
        $nickname = $PostData['nickname'];
        $tel = $PostData['tel'];
        $avatar = $PostData['avatar'];
        $email = $PostData['email'];

        $conn = getMysqli();
        $sql = "UPDATE account SET user_name =?, user_nickname =?, user_tel =?, user_avatar =?, user_email =? WHERE id =?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param('sssssi', $username, $nickname, $tel, $avatar, $email, $id);
        $stmt->execute();

        $result = $stmt->affected_rows;
        $stmt->close();

        if ($result > 0) return true;
        else return false;
    }

    public static function deleteById($id): bool
    {
        // TODO: Implement deleteById() method.
        $conn = getMysqli();
        $sql = "DELETE FROM account WHERE id =?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param('i', $id);
        return $stmt->execute();
    }
}