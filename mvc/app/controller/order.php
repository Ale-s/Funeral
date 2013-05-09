<?php
/**
 * Controller for handling orders.
 */
class controller_order {

    // Load an order from db and display information about it.
    function action_view($params) {
        $order = model_order::load_by_id($params[0]);
        @include_once APP_PATH . 'view/order_view.tpl.php';

    }

    function action_list() {
        $orders = model_order::get_orders();

        @include_once APP_PATH . 'view/order_list.tpl.php';
    }
}