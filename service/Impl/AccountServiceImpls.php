<?php

namespace service\Impl;

use mapper\Impl\AccountMapperImpls;

include "./../../mapper/Impl/AccountMapperImpls.php";

class AccountServiceImpls
{
    static function login($username, $password): ?array
    {
        // TODO: Implement login() method.
        $conn = getMysqli();
        $sql = "SELECT * FROM account where user_name = '$username' and user_password = '$password'";
        return getOne($sql,$conn);
//        return AccountMapperImpls::login($username, $password);
    }
}