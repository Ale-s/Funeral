<?php
/**
 * Controller for clientpage.
 */
class controller_client {

    function action_view($params) {
        $client = $params[0];
        $client = model_client::load_by_id($client);

        // Include view for this page
        @include_once APP_PATH . 'view/client_index.tpl.php';
    }
}