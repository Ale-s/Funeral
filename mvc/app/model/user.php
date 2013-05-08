<?php

/**
 * User model.
 */

class model_user {
    var $name;
    var $password;
    var $type;
    var $client_id;


    /**
     * Loads an user by USERNAME.
     */

    public static function load_by_username($username) {
        $db = model_database::instance();
        $sql = 'SELECT *
			FROM user
			WHERE user_name = ' . "'" . $username . "'";
        if ($result = $db->get_row($sql)) {
            $user = new model_user;
            $user->name = $result['user_name'];
            $user->password = $result['user_password'];
            $user->type = $result['user_type'];
            $user->client_id = $result['client_id'];
            return $user;
        }
        return FALSE;
    }



}