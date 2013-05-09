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
            $product->category_id = $result['category_id'];
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

    /*
     * Loads all products by category_id
     */

    public static function load_by_category_id($category_id){
        $db = model_database::instance();
        $sql = 'SELECT *
                FROM product
                WHERE category_id = ' . intval($category_id);

        $result[] = array();
        if ($result = $db->get_rows($sql)) {
            return $result;
        }
        return FALSE;
    }


    /*
     *
     */

    public static function get_category($category_id){
        $result = new model_category();
        if(($result::load_by_id($category_id))!=FALSE) {
            return $result =$result::load_by_id($category_id);
        }
        return FALSE;
    }

    /*
     * Add new product.
     */
    public static function add_product($name,$description,$price,$amount,$category){
        $db = model_database::instance();
        $sql = 'Insert into product (product_name,product_description,product_price,product_amount,category_id)
                values("' . mysql_real_escape_string($name) . '","' . mysql_real_escape_string($description) . '",'   . intval(mysql_real_escape_string($price)) . ',' . intval(mysql_real_escape_string($amount)) .','. intval($category) .')';
        $db->execute($sql);

    }
}

