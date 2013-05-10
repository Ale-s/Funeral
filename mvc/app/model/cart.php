<?php
/**
 * Cart model.
 */
class model_cart {

    public static function add ($product_id, $quantity) {
        $_SESSION['cart'][$product_id] = $quantity;
    }


}