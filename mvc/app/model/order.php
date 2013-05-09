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

    // Return a contract with an id.
    public function get_contract() {
        return model_contract::load_by_id($this->contract_id);
    }

    public function get_client() {
        return model_client::load_by_id($this->client_id);
    }

    public static function get_orders() {
        $db = model_database::instance();
        $sql = 'SELECT * from orders';
        $orders = array();
        $result = $db->get_rows($sql);
        foreach($result as $row) {
            $order = new model_order();
            $order->id = $row['order_id'];
            $order->client_id = $row['client_id'];
            $order->contract_id = $row['contract_id'];
            $orders[] = $order;
        }
        return $orders;
    }

    // Returns the orders of a client by a given id.
    public static function get_orders_by_id($id_client) {
        $db = model_database::instance();
        $sql = 'SELECT order_id
                        FROM orders
                        WHERE client_id = ' .intval($id_client);

        $orders = $db->get_rows($sql);
        return $orders;
    }

}