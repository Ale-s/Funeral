<?php

/**
 * Order model.
 */

class model_order {
    var $id;
    var $client_id;
    var $contract_id;


    /**
     * Loads an order by ID.
     */

    public static function load_by_id($id) {
        $db = model_database::instance();
        $sql = 'SELECT *
			FROM orders
			WHERE order_id = ' . intval($id);
        if ($result = $db->get_row($sql)) {
            $order = new model_order;
            $order->id = $result['order_id'];
            $order->client_id = $result['client_id'];
            $order->contract_id = $result['contract_id'];
            return $order;
        }
        return FALSE;
    }

<<<<<<< HEAD
    public function get_contract($contract_id) {
        $contract = new model_contract;

        if(($contract::load_by_id($contract_id))!=FALSE) {

            $contract =$contract::load_by_id($this->contract_id);

            return $contract;
        }
        return FALSE;
    }


=======

    // Returns the orders of a client by a given id.
    public static function get_orders($id_client) {
        $db = model_database::instance();
        $sql = 'SELECT order_id
                        FROM orders
                        WHERE client_id = ' .intval($id_client);

        $orders = $db->get_rows($sql);
        return $orders;
    }

>>>>>>> 9d4f9f1132900faac506e3f9fad4e0f2218dc6cc
}