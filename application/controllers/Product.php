<?php

    class Product extends CI_Controller
    {

        public function __construct()
        {

            parent::__construct ();

            $this -> load -> model ('Products_model', 'product');
            $this -> load -> model ('ProductImages_model', 'images');
            $this -> load -> model ('ProductOptions_model', 'options');

        }

        public function index ($product_uri)
        {

            $product_uri = strip_tags($product_uri);

            $product = $this -> product -> get (array (
                'productUrl' => $product_uri
            ));

            if ($product -> num_rows () > 0) {

                $product = $product -> row ();

                $data['product'] = $product;
                $data['images'] = $this -> images -> get_all ($product -> productID);
                $data['options'] = $this -> options -> get_all ($product -> productID);

                $this -> load -> view ('meta/meta1');
                $this -> load -> view ('header_nav');

                $this -> load -> view ('product', $data);

            }else {

                show_404();

            }

        }

    }

?>