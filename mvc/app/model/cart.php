<?php
/**
 * Cart model.
 */
class model_cart {

    // Add a product with a specific quantity in $_SESSION['cart'].
    public static function add ($product_id, $quantity) {
        $_SESSION['cart'][$product_id] = $quantity;
    }

    // Restore in database the old quantity when a product from $_SESSION['cart'] is deleted.
    public static function resetQuantity ($product_id,$quantity) {
        $db = model_database::instance();
        $sql1 = "Select product_amount from product where product_id =". intval($product_id);
        $row = $db->get_row($sql1);
        $q = intval($row['product_amount']);
        $old_quantity = intval($q + $quantity);
        $sql = ' UPDATE product
                    set product_amount = '. $old_quantity .' WHERE product_id = ' . intval($product_id);
        $db->execute($sql);
    }


}