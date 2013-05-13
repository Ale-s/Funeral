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
        $form_csv = FALSE;

        $clients = model_client::load_all();

        if (isset($_POST['form']['action'])) {

            if(!empty($_POST['form']['name'])){

                $file = 'fisier.csv';
                $client_name = $_POST['form']['name'];

           //     $client_id = model_client::load_by_name($_POST['form']['name']);
           //     var_dump($client_id);die();
                $order = model_order::get_orders_by_client($_POST['form']['name']);
                $o = (array) $order;

                if($fp = fopen($file, 'w')) {

                    foreach($o as $valori) {

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


                        $foo = array($valori['order_id'],$_POST['form']['name'],$data_contract,$status);
                      //  var_dump($foo);die();
                        fputcsv($fp,$foo);
                    }

                    // inchidem fisierul
                    fclose($fp);
                }
                $form_csv = TRUE;

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

    // Loads all products name from db and include the view to display them.
}