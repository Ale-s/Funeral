<?php
/**
 * Admin model.
 */
class model_admin {

	var $id;
	var $username;
	var $name;

	/**
	 * Validates admin username and password.
	 * @param $user Username
	 * @param $password Password
	 * @return FALSE or a valid admin ID
	 */
	public static function validate($user, $password) {
		$db = model_database::instance();
		$sql = 'SELECT admin_id 
			FROM admin 
			WHERE admin_username = "' . mysql_real_escape_string($user) . '" 
				AND admin_password = "' . md5($password) . '"';
		if ($result = $db->get_row($sql)) {
			return $result['admin_id'];
		}
		return FALSE;
	}

	/**
	 * Loads an admin user by ID.
	 */
	public static function load_by_id($id) {
		$db = model_database::instance();
		$sql = 'SELECT *
			FROM admin 
			WHERE admin_id = ' . intval($id);
		if ($result = $db->get_row($sql)) {
			$admin = new model_admin;
			$admin->id = $result['admin_id'];
			$admin->username = $result['admin_username'];
			$admin->name = $result['admin_name'];
			return $admin;
		}
		return FALSE;
	}
}