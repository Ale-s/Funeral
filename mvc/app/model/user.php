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
     * Return an user with a specified username.
     * @param $username Username.
     * @return bool|model_user
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

    /**
     * Return an user with a specified id.
     * @param $id ID.
     * @return bool|model_user
     */
    public static function load_by_client_id($id) {
        $db = model_database::instance();
        $sql = 'SELECT *
			FROM user
			WHERE client_id = ' . "'" . $id . "'";
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

    /**
     * Return a client with a specified id
     */
    public function get_client() {
        return model_client::load_by_id($this->client_id);

    }

    /** Creates an user.
     * @param $name
     * @param $password
     * @return bool|model_user
     */
   public function create_user($name,$password, $id) {
       $db = model_database::instance();

       //$sql =  'Insert into user (user_name,user_password,user_type,client_id) values(\'' . mysql_real_escape_string($name) . '\',\'' . mysql_real_escape_string($password) . '\',\'' . intval($id) . '\')';
        $sql = 'Insert into user (user_name,user_password,client_id,user_type) values("' . mysql_real_escape_string($name) . '","' . mysql_real_escape_string($password) . '","' . intval($id) . '",1)';
       if ($db->execute($sql)){
           return model_user::load_by_username($name);
       }
       return false;
   }


}