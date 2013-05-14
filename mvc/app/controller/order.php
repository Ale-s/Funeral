<?php
/**
 * Controller for handling orders.
 */


class controller_order {

    /**
     * Load an order from db and display information about it.
     */
    function action_view($params) {
        $order = model_order::load_by_id($params[0]);
        @include_once APP_PATH . 'view/order_view.tpl.php';

    }

    /**
     * Obtain all orders from database.
     */
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


    /**
     * For every selected product from checkbox , obtain all orders id and store them into an array.
     */
    function action_displayOrders() {
        $selectedProducts = $_POST['product'];
        if(empty($selectedProducts) ? $productsNr = 0 : $productsNr = 1);
        if($productsNr != 0) {
            $n = count($selectedProducts);
            for ($i = 0; $i < $n; $i++) {
                $products[] = $selectedProducts[$i];
                $product_id = model_product::get_id_by_name($selectedProducts[$i]);
                $orders[] = model_order::get_orderId_by_productId($product_id);
            }
        }
        @include_once APP_PATH . 'view/order_search.tpl.php';

    }

    /**
     * Obtain all orders that contains specifically products ids.
     */
    function action_displaySpecificOrders() {
        $selectedProducts = $_POST['product'];
        if(empty($selectedProducts) ? $productsNr = 0 : $productsNr = 1);
        if($productsNr != 0) {
            $n = count($selectedProducts);
            for ($i = 0; $i < $n; $i++){
                $productsId[] = model_product::get_id_by_name($selectedProducts[$i]);
            }

            $ordersId = model_order::get_specificOrders($productsId);
        }

        @include_once APP_PATH . 'view/order_specificSearch.tpl.php';
    }

}