<?php 

    class Login extends CI_Controller
    {

        public function __construct()
        {

            parent::__construct ();

            $this -> load -> model ('Users_model', 'user');

            $this -> load -> library ('form_validation');

        }

        public function index ()
        {

            $this -> load -> view ('meta/meta1');
            $this -> load -> view ('header_nav');

            $this -> load -> view ('user-process');

        }

    }

?>