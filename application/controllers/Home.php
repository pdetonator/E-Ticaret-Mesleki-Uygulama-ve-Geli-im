<?php

    class Home extends CI_Controller
    {

        public function __construct()
        {

            parent::__construct ();

            $this -> load -> model ('Products_model', 'product');

        }

        public function index ()
        {

            $data['products'] = $this -> product -> get_all ([], 20);

            $this -> load -> view ('meta/meta1.php');
            $this -> load -> view ('header_nav');
            $this -> load -> view ('homepage', $data);
        }

    }

?>