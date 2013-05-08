<?php
/**
 * Created by JetBrains PhpStorm.
 * User: ale
 * Date: 5/8/13
 * Time: 11:44 AM
 * To change this template use File | Settings | File Templates.
 */

class model_product {

    var $id;
    var $category_id;
    var $name;
    var $price;
    var $description;
    var $amount;
    var $image;
    var $url;


    /**
     * Loads a product by id.
     */
    public static function load_by_id($id) {
        $db = model_database::instance();
        $sql = 'SELECT *
			FROM product
			WHERE product_id = ' . intval($id);
        if ($result = $db->get_row($sql)) {
            $product = new model_product;
            $product->id = $result['product_id'];
            $product->category_id = $result['category__id'];
            $product->name = $result['product_name'];
            $product->price = $result['product_price'];
            $product->description = $result['product_description'];
            $product->amount = $result['product_amount'];
            $product->image = $result['product_image'];
            $product->url = $result['product_url'];
            return $product;
        }
        return FALSE;
    }

}
