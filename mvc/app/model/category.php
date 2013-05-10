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
        public static function load_by_id($id) {
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

        /** Add a category by name.
         * @param $name
         * @return bool|model_category
         */
        public static function add($name) {
            $db = model_database::instance();
            $sql = 'INSERT
  		            INTO category(category_name)
			        VALUES("'. mysql_real_escape_string($name) .'")';
            $result = mysql_query($sql);
            if (!$result) {
                return FALSE;
                die('Invalid query: ' . mysql_error());
            }
            return model_category::load_by_id($db->last_insert_id());
        }

        /** Delete a category by id.
         * @param $id
         * @return bool
         */
        public static function deleteC($id) {
            $db = model_database::instance();
            $sql = 'DELETE
  		            FROM category
			        where category_id ='. intval($id);
            $result = mysql_query($sql);
            if (!$result) {
                return FALSE;
                die('Invalid query: ' . mysql_error());
            }
            return TRUE;

        }

        /**
         * Edit a category by id.
         * @param $id
         * @param $n
         * @return bool
         */
        public static function editC($id,$n) {
            $db = model_database::instance();
            $sql = 'Update category
			        set category_name = "'. mysql_real_escape_string($n) .'" where category_id ='. intval($id);
            $result = mysql_query($sql);
            if (!$result) {
                return FALSE;
                die('Invalid query: ' . mysql_error());
            }
            return TRUE;
        }

        /**Gets all categories.
         * @return array|bool
         */
        public static function load_all() {
            $db = model_database::instance();
            $result2 = array();
            $sql = 'SELECT *
  		            FROM category';
            if ($result = $db->get_rows($sql)) {
                foreach($result as $value) {
                    $category = new model_category();
                    $category->id =$value['category_id'];
                    $category->name =$value['category_name'];
                    array_push($result2, $category);
                }
                return $result2;
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
            if(($product::load_by_category_id($id))!=FALSE) {
                //An array that contains the result of the function "load_by_category()".
                return $result =$product::load_by_category_id($id);
            }
            return FALSE;
        }

    }
