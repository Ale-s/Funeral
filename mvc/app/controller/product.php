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
        @include_once APP_PATH . 'view/product_listbycategory.tpl.php';
    }

    function action_addProduct($params){
        $form_error = FALSE;
        $idCategory = $params[0];
        $category = new model_category();
        $category = model_category::load_by_id($idCategory);

        if (isset($_POST['form']['action'])) {
            if (!empty($_POST['form']['name']) && !empty($_POST['form']['price'])){
                $product=new model_product();
                $product::add_product($_POST['form']['name'], $_POST['form']['description'],$_POST['form']['price'],$_POST['form']['amount'],$idCategory);
                header('Location: ' . APP_URL . 'product/listbycategory/' . $category->id );
                die;
            }
            $form_error = TRUE;
        }

        @include_once APP_PATH . 'view/add_product.tpl.php';
        }
}


