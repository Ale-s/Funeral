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

    // Delete a client by a given id.
    public static function delete_by_id($client_id) {
        $db = model_database::instance();
        $sql = 'DELETE FROM client
                WHERE client_id = ' . intval($client_id);
        $db->execute($sql);
    }

    // Get the orders for the current client.
    public function get_orders() {
        model_order::get_orders($this->id);
    }

}