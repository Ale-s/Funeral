<?php
/**
 * Created by JetBrains PhpStorm.
 * User: ale
 * Date: 5/8/13
 * Time: 3:05 PM
 * To change this template use File | Settings | File Templates.
 */

class controller_product {

    /*
     * Main product class
     */
    function action_index($params){
        $id = $params[0];
        if($product = model_product::load_by_id($id)){

        }
        // Include view for this page
        @include_once APP_PATH . 'view/product_view.tpl.php';
    }
}