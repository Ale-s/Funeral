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
        $id = $_POST['form']['id'];
        unset($_SESSION['cart'][$id]);
        header('Location:'. APP_URL.'cart/view');
        die();
    }



}