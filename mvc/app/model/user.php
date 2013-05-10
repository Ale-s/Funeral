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

    // Return a client with a specifically id
    public function get_client() {
        return model_client::load_by_id($this->client_id);

    }

    public function get_all_clients() {

    }
    /** Creates an user.
     * @param $name
     * @param $password
     * @return bool|model_user
     */
   public function create_user($name,$password, $id) {
       $db = model_database::instance();

       $sql =  'Insert into user (user_name,user_password,client_id) values(\'' . mysql_real_escape_string($name) . '\',\'' . mysql_real_escape_string($password) . '\',\'' . intval($id) . '\')';

       if ($db->execute($sql)){
           return model_user::load_by_username($name);
       }
       return false;
   }

}