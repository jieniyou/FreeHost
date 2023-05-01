<?php

namespace mapper\Impl;

class AccountMapperImpls
{
    static function login($username, $password): ?array
    {
        write_to_console("456");
        $conn = getMysqli();
        $sql = "SELECT * FROM account where user_name = '$username' and user_password = '$password'";
        return getOne($sql,$conn);
    }
}