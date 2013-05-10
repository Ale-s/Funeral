<?php
class controller_login {
    /**
    * Login page.
    */
    function action_login() {

        // If the form was submitted, validate credentials
        $form_error = FALSE;
        if (isset($_POST['form']['action'])) {
        if (model_login::validate($_POST['form']['username'], $_POST['form']['password'])) {
            $username = $_POST['form']['username'];
            $nr_users = model_login::get_users_number($username);
            if ( $nr_users > 0 ) {
                $_SESSION['loggedin'] = 1;
            }
            else {
                $_SESSION['loggedin'] = NULL;
            }
        header('Location: ' . APP_URL );
        die;
        }
        $form_error = TRUE;
        }

    // Include view for this page
    @include_once APP_PATH . 'view/login_view.tpl.php';
    }

    /**
     * Logout action.
     */
    function action_logout() {
         unset($_SESSION['loggedin']);
         header('Location: ' . APP_URL);
         die;
    }

}
?>