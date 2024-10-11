<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

function is_loggged_in()
{
    if (isset($_SESSION['email'])) {
        return true;
    } else {
        return false;
    }
}

function wpent_get_current_user()
{
    if (is_loggged_in()) {
        return array('login' => 1, 'user_fields' => array('email' => $_SESSION['email'],
         'display_name' => $_SESSION['username']));
    } else {
        return array('login' => 0, 'user_fields' => false);
    }
}