<?php


class UserInterface
{
    const TABLE_USERS = 'users';

    public static function authenticateUser($username, $password)
    {
        $sql = "
            SELECT
                users_id,
                first_name,
                middle_name,
                last_name,
                email_address,
                user_type,
                password
            FROM
                users
            WHERE (
                username = '{$username}'
            OR
                email_address = '{$username}'
            )
            AND
                remove = 0;
        ";
        $data = Dbcon::execute($sql);
        $result = DBcon::query_fetch_assoc($data);
        if (password_verify($password, $result['password'])) {
            $_SESSION['userID'] = $result['users_id'];
            $_SESSION['name'] = $result['first_name'] .' '. $result['last_name'];
            $_SESSION['emailAddress'] = $result['email_address'];
            $_SESSION['userType'] = $result['user_type'];
            return true;
        } else {
            return false;
        }
    }
}
//EOF