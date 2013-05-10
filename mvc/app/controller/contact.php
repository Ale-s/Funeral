<?php
    class controller_contact {

        function action_view($params)  {
            @include_once APP_PATH . 'view/contact_view.tpl.php';
        }
    }