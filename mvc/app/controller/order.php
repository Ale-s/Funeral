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
        $form_csv = FALSE;
        $form_error = FALSE;

        $clients = model_client::load_all();

        if (isset($_POST['form']['action'])) {

            if(!empty($_POST['form']['name'])){
                $form_error = TRUE;


                $file = 'fisier.csv';
                $order = model_order::get_orders_by_client($_POST['form']['name']);
                $client = model_client::load_by_id($_POST['form']['name']);


                //var_dump(sizeof($order));die();
                if (sizeof($order) == 0){
                    $form_error = TRUE;
                }

                else {
                    $fp = fopen($file, 'w');
                    foreach($order as $valori) {
                        $contract = model_contract::load_by_id($valori['contract_id']);
                        $data_contract = $contract->date;
                        if ($valori['status'] == 1){
                            $status = 'not valid';
                        }
                        elseif($valori['status'] == 2){
                            $status = 'valid';
                        }
                        else {
                            $status= 'finalised';
                        }



                        fputcsv($fp,array($valori['order_id'],$client->name,$data_contract,$status));
                    }

                    $path = 'C:\wamp\www\Funeral\mvc\fisier.csv';
                    if (file_exists($path)) {

                        //set appropriate headers
                        header('Content-Description: File Transfer');
                        header('Content-Disposition: attachment; filename='.basename($path));
                        header('Content-Length: ' . filesize($path));
                        ob_clean();// Clean (erase) the output buffer.
                        flush();

                        //read the file from disk and output the content.
                        readfile($path);
                        exit;
                    }


                    // inchidem fisierul
                    fclose($fp);
                    $form_csv = TRUE;

                }

            }


        }
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

    function action_myOrders(){
        $orders = model_order::get_user_orders($_SESSION['client_id']);

        @include_once APP_PATH . 'view/order_mylist.tpl.php';
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