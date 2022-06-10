<?php
function check_login()
{
    $CI =& get_instance();
    if ($CI->session->userdata('is_loggedin') == FALSE) {
        redirect('auth/login');
    }
}
