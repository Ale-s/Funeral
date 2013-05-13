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

    function action_my_account($params) {
        $form_error = FALSE;
        $client = model_client::load_by_id($params[0]);
        $user = model_user::load_by_client_id($params[0]);
        $id = $client->id;
        if (isset($_POST['form']['action'])) {
            if (!empty($_POST['form']['name']) && !empty($_POST['form']['cnp'])){
                $client::edit_my_account($id,$_POST['form']['name'], $_POST['form']['cnp'],$_POST['form']['address'],$_POST['form']['telephone']);
                header('Location: ' . APP_URL . 'user/my_account/' . $id );
                //echo 'Succes';

                die;
            }
            $form_error = TRUE;
        }

        //Include view for this page.
        @include_once APP_PATH . 'view/my_account_view.tpl.php';
}
}
