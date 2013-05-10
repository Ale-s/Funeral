<?php
    class controller_category {

        /**
         * Load all categories.
        **/
        function action_list() {

            $result = model_category::load_all();
            @include_once APP_PATH . 'view/category_list.tpl.php';
        }

        /**Add a new category.
         * @param $params
         */
        function action_add($params) {
            $form_error = false;
            if (isset($_POST['form']['action'])) {
                    if($category=model_category::add($_POST['form']['name'])) {
                        header('Location: ' . APP_URL . 'product/listbycategory/' . $category->id);
                        die;
                    }
                $form_error = TRUE;
                }
            @include_once APP_PATH . 'view/category_add.tpl.php';

        }

        /**Delete a category by id.
         * @param $params
         */
        function action_delete($params) {
            $form_error =false;
            $category= model_category::load_by_id($params[0]);
            $id =$params[0];
            if(isset($_POST['form']['action'])) {
                //Check if the current category contains products.
                if($category::get_products_by_id($id)) {
                    //If the category contains products,an error message appears.
                    $form_error =TRUE;
                }
                else {
                    if( model_category::deleteC($id)){
                        header('Location: ' . APP_URL . 'category/list');
                        die;
                    }
                }
            }
            @include_once APP_PATH . 'view/category_delete.tpl.php';
        }

        /**Edit category by id.
         * @param $params
         */
        function action_edit($params) {
            $form_error =false;
            $category= model_category::load_by_id($params[0]);
            $id =$params[0];
            if(isset($_POST['form']['action'])) {
                //Check if the "Ok" button is set.
                if($_POST['form']['action']['value'] == "Ok") {
                    //Modify category name.
                    if( model_category::editC($id,$_POST['form']['name'])){
                        header('Location: ' . APP_URL . 'category/list');
                        die;
                    }
                }
            $form_error =false;
            }
            @include_once APP_PATH . 'view/category_edit.tpl.php';
        }



    }