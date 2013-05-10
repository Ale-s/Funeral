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
    // Register a user
    function action_register($params) {
        $form_error = FALSE;
        if (isset($_POST['form']['action'])) {
            if ($client = model_client::create($_POST['form']['name'], $_POST['form']['cnp'], $_POST['form']['address'],$_POST['form']['telephone']))
            { if($user = model_user::create_user($_POST['form']['username'], $_POST['form']['password'],$client->id)){
               //alert('User registered successfully!');
               //header('Location: ' . APP_URL . 'view/admin/login');
                    echo 'User registered successfully!';
                die;
            }
        }
            $form_error = TRUE;
        }
        @include_once APP_PATH . 'view/user_register.tpl.php';

    }
}
