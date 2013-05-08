<?php
    /**
       * Category model.
    */

    class model_category {
        var $id;
        var $name;

        /** Loads a category by id.
         * @param $id
         * @return bool|model_category
         */
        public static function load__by_id($id) {
            $db = model_database::instance();
            $sql = 'SELECT *
  		        FROM category
			        WHERE category_id = ' . intval($id);
            if ($result = $db->get_row($sql)) {
                $category = new model_category;
                $category->id = $result['category_id'];
                $category->name = $result['category_name'];
                return $category;
            }
            return FALSE;
        }

        /**
         * Returns all products by category id.
         * @param $id
         * @return mixed
         */
        public static function get_products_by_id($id) {
            $product = new model_product();
            $result = new model_product();
            if(($product::load_by_category($id))!=FALSE) {
                //An array that contains the result of the function "load_by_category()".
                return $result =$product::load_by_category($id);
            }
            return FALSE;
        }
    }
