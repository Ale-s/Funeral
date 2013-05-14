<?php
/**
 * Controller for cart.
 */
class controller_cart {

    // Include the cart_view.tpl.php to display all products from $_SESSION['cart']
    public function action_view() {

        @include_once APP_PATH . 'view/cart_view.tpl.php';
    }

    // Delete a row from shopping cart
    public function action_deleteProduct() {
        $product_id = intval($_POST['form']['id']);
        $quantity = intval($_POST['form']['quantity']);
        model_cart::resetQuantity($product_id,$quantity);
        unset($_SESSION['cart'][$product_id]);
        header('Location:'. APP_URL.'cart/view');
        die();
    }

    //Add a product to shopping cart
    public function action_add($params) {
        $prod = $params[0];
        $product = model_product::load_by_id($prod);




        if (isset ($_POST['form']['action'])){
            if ($product->amount >= $_POST['form']['amount']){
                $cart = model_cart::add($prod,$_POST['form']['amount']);
                //$_SESSION['cart'][$product->id] = $_POST['form']['amount'];
                $quantity = $product->amount - $_POST['form']['amount'];
                $product->edit_product_amount_by_id($quantity);

                header('Location: ' . APP_URL . 'cart/view/' );

                // Include view for this page.
                @include_once APP_PATH . 'view/cart_view.tpl.php';

            }
            else{
                $form_error = TRUE;
                @include_once APP_PATH . 'view/product_view.tpl.php';
            }
        }

    }



}