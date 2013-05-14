<?php
class controller_product {

    /**
     * Main product class
     */
    function action_view($params){
        $prod = $params[0];
        $product = model_product::load_by_id($prod);
        $form_error = FALSE;


        if (isset ($_POST['form']['action'])){
           if ($product->amount >= $_POST['form']['amount']){
               $_SESSION['cart'][$product->id] = $_POST['form']['amount'];
               $quantity = $product->amount - $_POST['form']['amount'];
               $product::edit_product_by_id($product->id,$product->name,$product->description,$product->price,$quantity);
               // Include view for this page.
               @include_once APP_PATH . 'view/cart_view.tpl.php';
           }
            else{
                $form_error = TRUE;
                @include_once APP_PATH . 'view/product_view.tpl.php';

            }
        }
        else{
            // Include view for this page.
            @include_once APP_PATH . 'view/product_view.tpl.php';
        }

    }

    /**
     * Load all products from a category.
     */
    function action_listbycategory($params){
        $category = model_category::load_by_id($params[0]);
        $products = model_product::load_by_category_id($params[0]);


        //Include view for this page.
        @include_once APP_PATH . 'view/product_listbycategory.tpl.php';
    }

    /**
     * Add a new product.
     */
    function action_addProduct($params){
        $form_error = FALSE;
        $idCategory = $params[0];
        $category = model_category::load_by_id($idCategory);

        if (isset($_POST['form']['action'])) {
            if (!empty($_POST['form']['name']) && !empty($_POST['form']['price'])){
                if($product = model_product::add_product($_POST['form']['name'], $_POST['form']['description'],$_POST['form']['price'],$_POST['form']['amount'],$idCategory)) {
                    header('Location: ' . APP_URL . 'product/view/' . $product->id);
                    die;
                }
                $form_error = TRUE;

            }
            $form_error = TRUE;
        }

        //Include view for this page.
        @include_once APP_PATH . 'view/product_addProduct.tpl.php';
    }


    /**
     * Delete a product by id.
     */
    function action_deleteProduct($params){
         $product = model_product::load_by_id($params[0]);
         $category = $product->category_id;
         if (isset($_POST['form']['action'])) {
            model_product::delete_product_by_id($params[0]);
            header('Location: ' . APP_URL . 'product/listbycategory/' . $category );

            die;
        }

        //Include view for this page.
        @include_once APP_PATH . 'view/product_deleteProduct.tpl.php';
    }


    /**
     * Edit a product by id.
     */
    function action_editProduct($params){
        $form_error = FALSE;

        $product = model_product::load_by_id($params[0]);
        $category = $product->category_id;
        $id = $product->id;
        if (isset($_POST['form']['action'])) {
            if (!empty($_POST['form']['name']) && !empty($_POST['form']['price'])){
                $product::edit_product_by_id($id,$_POST['form']['name'], $_POST['form']['description'],$_POST['form']['price'],$_POST['form']['amount']);
                header('Location: ' . APP_URL . 'product/listbycategory/' . $category );
                die;
            }
            $form_error = TRUE;
        }

        //Include view for this page.
        @include_once APP_PATH . 'view/product_editProduct.tpl.php';
    }


    // Loads all products name from db and include the view to display them.
    function action_displayProductsName() {
        $products = model_product::get_all_productsName();

        @include_once APP_PATH . 'view/product_displayProductsName.php';
    }
}


