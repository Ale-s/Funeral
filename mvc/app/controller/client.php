<?php
/**
 * Controller for clientpage.
 */
class controller_client {

    function action_view($params) {
        $client = $params[0];
        if (model_client::load_by_id($client)!=false){
            $client = model_client::load_by_id($client);
        }
        else {
            return false;
        }

        // Include view for this page
        @include_once APP_PATH . 'view/client_view.tpl.php';
    }
}