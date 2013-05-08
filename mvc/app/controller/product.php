<?php
/**
 * Controller for handling users.
 */

class controller_product {

    /*
     * Main product class
     */

    // Load a product from db and display information about him.
    function action_view($params){
        $product = model_product::load_by_id($params[0]);

        // Include view for this page
        @include_once APP_PATH . 'view/product_view.tpl.php';
    }
}
