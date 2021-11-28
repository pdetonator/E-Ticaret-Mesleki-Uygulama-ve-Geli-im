<?php

class ProductOptions_model extends CI_Model
{

    private $table_name = 'product_options';

    public function __construct()
    {

        parent::__construct ();

    }

    public function get_all ($productID)
    {

        $images = $this -> db
            -> get_where ($this -> table_name, array (
                'productID' => $productID
            ))
            -> result ();

        return $images;

    }

}

?>