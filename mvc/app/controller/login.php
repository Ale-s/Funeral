<?php
class controller_login {
    /**
    * Login page for admin.
    */
    function action_login() {

        // If the form was submitted, validate credentials
        $form_error = FALSE;
        if (isset($_POST['form']['action'])) {
        if ($admin_user_id = model_login::validate($_POST['form']['username'], $_POST['form']['password'])) {

        header('Location: ' . APP_URL );
        die;
        }
        $form_error = TRUE;
        }

    // Include view for this page
    @include_once APP_PATH . 'view/login_view.tpl.php';
    }

}
?>