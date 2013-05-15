<?php

    class model_rating {
        var $rating;
        var $cid;
        var $pid;

        public static function validate_rating($cid, $pid) {
            $db = model_database::instance();
            $ok = TRUE;
            $sql = 'select * from
  		            ratings where
			        client_id ='. $cid .' and product_id = '. $pid ;
            $result[] = array();
            $result = $db->get_rows($sql);
            if (!empty($result)) {
                $ok = FALSE;
            }
            return $ok;
        }

        public static function add_rating($rating, $cid, $pid) {
            $sql = 'INSERT
  		            INTO ratings(rating, client_id, product_id)
			        VALUES('.$rating.', '. $cid .', '. $pid . ')';
            $result = mysql_query($sql);
                if (!$result) {
                    return FALSE;
                    die('Invalid query: ' . mysql_error());
                }

            return TRUE;

        }
        public static function get_rating($product_id) {
            $db = model_database::instance();
            $sql = 'SELECT AVG(rating) FROM ratings WHERE product_id = '.intval($product_id) . '  group by product_id';
            $result = mysql_query($sql);
            $result1 = $db->get_row($sql);
            if (!$result) {
                return FALSE;
                die('Invalid query: ' . mysql_error());
            }
            return $result1['AVG(rating)'];
        }




    }