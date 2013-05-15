<?php
 class model_comment{
     var $id;
     var $product_id;
     var $comment;
     /**
      * Gets all comments by comment_id.
      * @param $comment_id
      * @return bool|model_comment
      */
     public static function load_by_id($comment_id){
         $db = model_database::instance();
         $sql = 'SELECT *
			FROM comments
			WHERE comment_id = ' . intval($comment_id);
         if ($result = $db->get_row($sql)) {
             $comment = new model_comment;
             $comment->id = $result['comment_id'];
             $comment->product_id = $result['product_id'];
             $comment->comment = $result['comment'];

             return $comment;
         }
         return FALSE;
     }
     /**
      * Gets all comments by product_id.
      * @param $product_id
      * @return array|bool
      */
     public static function load_by_product_id($product_id){
         $db = model_database::instance();
         $sql = 'SELECT *
                FROM comments
                WHERE product_id = ' . intval($product_id);

         $result[] = array();
         if ($result = $db->get_rows($sql)) {
             return $result;
         }
         return FALSE;
     }
     //Loads all the comments
     public static function load_all() {
         $db = model_database::instance();
         $sql = 'SELECT * from comments';
         $comments = array();
         $result = $db->get_rows($sql);
         foreach($result as $row) {
             $comment = new model_comment();
             $comment->comment_id = $row['comment_id'];
             $comment->product_id = $row['product_id'];
             $comment->comment = $row['comment'];

             $comments[] = $comment;
         }
         return $comments;
     }

     public static function add_comment($id,$comment) {
         $db = model_database::instance();

         //$sql = 'Insert into comments(product_id,comment) values ("' . intval($id) . '","' . mysql_real_escape_string($comment) . '")';
         $sql = "Insert into comments(product_id,comment) values (" . intval($id) . ", '". mysql_real_escape_string($comment) . "')";
         $db->execute($sql);

         // return model_comment::load_by_product_id($db->last_insert_id());

     }

     public static function count_comments($product_id){
         $db = model_database::instance();

         $sql = 'select count(*) from comments where product_id = '. intval($product_id);
         $result= mysql_query($sql);

                 // if (!$result) echo mysql_error();
        // $row = mysql_fetch_row($result);
         echo mysql_result($result,0);
        // return $row;
     }
     public static function add_mcomment($id,$comment) {
         $db = model_database::instance();

         //$sql = 'Insert into comments(product_id,comment) values ("' . intval($id) . '","' . mysql_real_escape_string($comment) . '")';
         $sql = "Insert into multiple_comments(comment_id,mcomment) values (" . intval($id) . ", '". mysql_real_escape_string($comment) . "')";
         $db->execute($sql);

         // return model_comment::load_by_product_id($db->last_insert_id());

     }


     public static function load_by_comment_id($comment_id){
         $db = model_database::instance();
         $result2 = array();
         $sql = 'SELECT *
                FROM multiple_comments
                WHERE comment_id = ' . intval($comment_id);

         if ($result = $db->get_rows($sql)) {
             foreach($result as $value) {
                 $m_comment = new model_comment();
                 $m_comment->id =$value['mc_id'];
                 $m_comment->comment_id =$value['comment_id'];
                 $m_comment->comment =$value['mcomment'];
                 array_push($result2, $m_comment);
             }
             return $result2;
         }
         return FALSE;

     }
 }