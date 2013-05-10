<?php
class model_login{
    var $username;
    var $password;
    var $type;

public static function validate($username, $password) {
    $db = model_database::instance();
    $sql = 'SELECT user_name
			FROM user
			WHERE user_name = "' . $username . '"
				AND user_password = "' . $password . '"';
    if ($result = $db->get_row($sql)) {
        return $result['user_name'];
    }
    return FALSE;
}

 public static function get_users_number($username) {
     $db = model_database::instance();
     $sql = "SELECT COUNT(*)
             FROM user
             WHERE user_name = '" . $username . "'";
     $result = $db->get_row($sql);

     return $result;
 }
}