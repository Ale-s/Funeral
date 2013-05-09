<?php
class controller_product {

    /*
     * Main product class
     */
    function action_view($params){
        $prod = $params[0];
        $product = model_product::load_by_id($prod);

        // Include view for this page.
        @include_once APP_PATH . 'view/product_view.tpl.php';
    }

    function action_listbycategory($params){
        $category = model_category::load_by_id($params[0]);
        $products = model_product::load_by_category_id($params[0]);

        //Include view for this page.
        @include_once APP_PATH . 'view/productlistby_category.tpl.php';
    }
}