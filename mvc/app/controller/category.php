<?php
    class controller_category {

        //Load all categories.
        function action_load() {
            $category = new model_category();
            $result = $category::load_all();
            @include_once APP_PATH . 'view/category_view.tpl.php';
        }
    }