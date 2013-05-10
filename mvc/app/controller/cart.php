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



}