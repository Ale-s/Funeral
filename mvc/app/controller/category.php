<?php
    class controller_category {

        //Load all categories.
        function action_list() {

            $category = new model_category();
            $result[] = $category::load_all();
            @include_once APP_PATH . 'view/category_list.tpl.php';
        }

        function action_add($params) {
            $form_error = false;
            if (isset($_POST['form']['action'])) {
                    if(model_category::add($_POST['form']['name'])) {
                        header('Location: ' . APP_URL . 'category/list');
                        die;
                    }
                $form_error = TRUE;
                }
            @include_once APP_PATH . 'view/category_add.tpl.php';

        }



    }