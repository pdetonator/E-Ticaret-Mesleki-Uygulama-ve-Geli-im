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



        }

    }

?>