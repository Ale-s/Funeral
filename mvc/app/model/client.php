<?php
/**
 * Client model.
 */
class model_client {

    var $id;
    var $name;
    var $pin;
    var $address;
    var $phone;

    /**
     * Loads a client by ID.
     */
    public static function load_by_id($client_id) {
        $db = model_database::instance();
        $sql = 'SELECT *
			FROM client
			WHERE client_id = ' . intval($client_id);
        if ($result = $db->get_row($sql)) {
            $client = new model_client;
            $client->id = $result['client_id'];
            $client->name = $result['client_name'];
            $client->pin = $result['client_pin'];
            $client->address = $result['client_address'];
            $client->phone = $result['client_phone'];
            return $client;
        }
        return FALSE;
    }

    /**
     * Loads all the clients.
     */
    public static function load_all() {
        $db = model_database::instance();
        $sql = 'SELECT * from client';
        $clients = array();
        $result = $db->get_rows($sql);
        foreach($result as $row) {
            $client = new model_client();
            $client->id = $row['client_id'];
            $client->name = $row['client_name'];
            $client->pin = $row['client_pin'];
            $client->address = $row['client_address'];
            $client->phone = $row['client_phone'];
            $clients[] = $client;
        }
        return $clients;
    }

    /**
     * Delete a client by id.
     */
    public function delete_by_id($id) {
        $client = model_client::load_by_id($id);
        $db = model_database::instance();
        $sql = 'DELETE FROM client
                WHERE client_id = ' . intval($id);
        $db->execute($sql);
    }

    /**
     * Get all the orders.
     */
    public function get_orders() {
        model_order::get_orders($this->id);
    }

    /** Creates a client.
     * @param $name
     * @param $pin
     * @param $address
     * @param $phone
     * @return bool|model_client
     */
    public function create($name,$pin,$address,$phone) {
        $db = model_database::instance();

        $sql = 'insert into client(client_name,client_pin,client_address,client_phone) values
                 ("' . mysql_real_escape_string($name) . '","' . mysql_real_escape_string($pin) . '","' . mysql_real_escape_string($address) . '","' . mysql_real_escape_string($phone) . '")';

        if ($db->execute($sql)){
            return model_client::load_by_id($db->last_insert_id());
        }
        return false;
    }

    public function edit_my_account($id,$name,$pin,$address,$telephone) {
        $db = model_database::instance();
        $sql = 'update client set client_name  = "' . mysql_real_escape_string($name) . '", client_pin = "' . mysql_real_escape_string($pin) . '", client_address= "' . mysql_real_escape_string($address) . '", client_phone = "' . mysql_real_escape_string($telephone) . '" where client_id = "'.intval($id) .'" ';
        $db->execute($sql);
    }
}