<?php 

    class User extends CI_Controller
    {

        public function __construct()
        {
            
            parent::__construct ();

        }

        public function logout ()
        {

            if (user_isLogin()) {

                $this -> session -> unset_userdata ('user');

                redirect (base_url ('giris-yap'));

            }else {

                show_404();

            }

        }

    }

?>