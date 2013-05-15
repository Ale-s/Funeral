<?php
class controller_product {

    /**
     * Main product class
     */
    function action_view($params){
        $prod = $params[0];
        $product = model_product::load_by_id($prod);

        $form_error = FALSE;

        @include_once APP_PATH . 'view/product_view.tpl.php';

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
                    model_product::insert_words();
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
            model_product::insert_words();
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
                model_product::insert_words();
                header('Location: ' . APP_URL . 'product/listbycategory/' . $category );
                die;
            }
            $form_error = TRUE;
        }

        //Include view for this page.
        @include_once APP_PATH . 'view/product_editProduct.tpl.php';
    }

    function action_searchProduct($param){
        if (isset($_POST['form']['action'])) {
            if (!empty($_POST['form']['word'])) {
                if (model_product::search_product($_POST['form']['word'])) {
                $products_list = model_product::search_product($_POST['form']['word']);
                }
                else {
                    $products_list = array("product_name" => "No products found!");
                }
            }

        }

        @include_once APP_PATH . 'view/product_search.tpl.php';
    }

    function action_searchProduct2($param){
//        model_product::init_search_table();
//        model_product::insert_words();
        if (isset($_POST['form']['action'])) {
            if (!empty($_POST['form']['word'])) {
                if (model_product::get_products($_POST['form']['word'])) {
                    $products_list = model_product::search_product($_POST['form']['word']);
                }
                else {
                    $products_list = array("product_name" => "No products found!");
                }
            }

        }

        @include_once APP_PATH . 'view/product_search2.tpl.php';
    }


    // Loads all products name from db and include the view to display them.
    function action_displayProductsName() {
        $products = model_product::get_all_productsName();

        @include_once APP_PATH . 'view/product_displayProductsName.php';
    }

    function action_addComment($params) {
        $forms_error = FALSE;
        $product = model_product::load_by_id($params[0]);

        $idP = $product->id;

        if (isset($_POST['form']['action'])) {
            model_comment::add_comment($idP,$_POST['form']['comment']);

                //@include_once APP_PATH . 'view/comment_view.tpl.php';
            header('Location: ' . APP_URL . 'product/view/' . $idP );

            $forms_error = false;

        }
        else {
            $forms_error = true;
        }

        $comments = model_comment::load_by_product_id($idP);

        @include_once APP_PATH . 'view/product_view.tpl.php';
    }

    function action_addMComments($params){
        $form_error = FALSE;
        $comment = model_comment::load_by_id($params[0]);
        $idC = $comment->id;
        $idP = $comment->product_id;


        if (isset($_POST['form']['action'])) {

                model_comment::add_mcomment($idC,$_POST['form']['comment']);
                    header('Location: ' . APP_URL . 'product/view/' . $idP);


                $form_error = false;


        }
        else {
            $forms_error = true;
        }

        //Include view for this page.
        @include_once APP_PATH . 'view/multiple_comments.tpl.php';
    }


}


