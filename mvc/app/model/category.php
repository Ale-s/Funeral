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
    }
