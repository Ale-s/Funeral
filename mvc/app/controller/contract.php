<?php


class controller_contract {


    function action_index($params) {
        $contract_id = $params[0];
        $contract = model_contract::load_by_id($contract_id);


    // Include view for this page
       @include_once APP_PATH . 'view/contract_view.tpl.php';
}
}