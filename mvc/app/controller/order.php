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

    function action_changeStatus($params) {
        $order = model_order::load_by_id($params[0]);
        if (isset($_POST['form']['action'])) {
            model_order::change_status($params[0], $_POST['form']['option']);
            header('Location: ' . APP_URL . 'order/list/' );
            die;
        }
    }
}