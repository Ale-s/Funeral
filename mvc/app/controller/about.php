<?php
    class controller_about {

        function action_view($params)  {
            @include_once APP_PATH . 'view/about_view.tpl.php';
        }
    }