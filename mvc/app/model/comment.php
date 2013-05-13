<?php
 class model_comment{
     var $id;
     var $product_id;
     var $comment;

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


 }