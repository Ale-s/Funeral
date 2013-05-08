<?php
/**
 * Controller for handling users.
 */
class controller_user {

    // Load an user from db and display information about him.
    function action_view($params) {
        $user = model_user::load_by_username($params[0]);
        @include_once APP_PATH . 'view/user_view.tpl.php';

    }
}