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
     * @param $id
     * @return bool|model_product
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


    /**
     * Gets all products by category_id.
     * @param $category_id
     * @return array|bool
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





    /**
     * @param $category_id
     * @return bool|model_category
     */
    public static function get_category($category_id){
        $result = new model_category();
        if(($result::load_by_id($category_id))!=FALSE) {
            return $result =$result::load_by_id($category_id);
        }
        return FALSE;
    }


    /**
     * Add a new product.
     * @param $name
     * @param $description
     * @param $price
     * @param $amount
     * @param $category
     * @return bool|model_product
     */
    public static function add_product($name,$description,$price,$amount,$category){
        $db = model_database::instance();
        $sql = 'Insert into product (product_name,product_description,product_price,product_amount,category_id)
                values("' . mysql_real_escape_string($name) . '","' . mysql_real_escape_string($description) . '",'   . intval(mysql_real_escape_string($price)) . ',' . intval(mysql_real_escape_string($amount)) .','. intval($category) .')';
        $db->execute($sql);

        return model_product::load_by_id($db->last_insert_id());

    }



    /**
     * Delete a product by id
     * @param $idProduct
     */
    public static function delete_product_by_id($idProduct){
        $db = model_database::instance();
        $sql = 'delete from product where product_id = ' .intval($idProduct);
        $db->execute($sql);
    }


    /**
     * Edit a product by id.
     * @param $id
     * @param $name
     * @param $description
     * @param $price
     * @param $amount
     */
    public static function edit_product_by_id($id,$name,$description,$price,$amount){
        $db = model_database::instance();
        $sql = 'update product set product_name  = "' . mysql_real_escape_string($name) . '", product_description = "' . mysql_real_escape_string($description) . '",product_price = '   . intval(mysql_real_escape_string($price)) . ',product_amount = ' . intval(mysql_real_escape_string($amount)) .' where product_id = ' . intval($id);
        $db->execute($sql);
    }
}

