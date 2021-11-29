<?php

    defined('BASEPATH') OR exit('No direct script access allowed');

    if ( !function_exists('login_active')) {

        function login_active ()
        {

            if (uri_string() == 'giris-yap') echo 'active';

        }

    }

    if ( !function_exists('register_active')) {

        function register_active ()
        {

            if (uri_string() == 'uye-ol') echo 'active';

        }

    }

    if ( !function_exists('filter_str')) {

        function filter_str($val)
        {

            return htmlspecialchars(trim($val));

        }

    }

    if ( !function_exists('filter')) {

        function filter ($data)
        {

            array_map ('filter_str', $data);
        }

    }

?>