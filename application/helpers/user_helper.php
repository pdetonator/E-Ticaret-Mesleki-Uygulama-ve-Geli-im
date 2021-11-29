<?php 

    if ( !function_exists( 'user_isLogin')) {

        function user_isLogin ()
        {

            if (isset ($_SESSION['user']['login']) && $_SESSION['user']['login'] == TRUE) return true;

            return false;

        }

    }

    if ( !function_exists( 'login_redirect')) {

        function login_redirect ()
        {

            if (user_isLogin()) redirect (base_url());

        }

    }

?>