<?php

    class Products_model extends CI_Model
    {

        private $table_name = 'products';

        public function __construct()
        {

            parent::__construct ();

        }

        public function get_all ($where = array (), $limit = null)
        {

            $products = $this -> db
                              -> join ('categories', 'categoryID = productCategory', 'join')
                              -> order_by ('productID', 'DESC')
                              -> limit ($limit)
                              -> get_where ($this -> table_name, $where)
                              -> result ();

            return $products;

        }

        public function get ($where)
        {

            $product = $this -> db
                             -> join ('categories', 'categoryID = productCategory', 'join')
                             -> get_where ($this -> table_name, $where);

            return $product;

        }

        public function delete ($where)
        {

            $delete_product = $this -> db
                                    -> where ($where)
                                    -> delete ($this -> table_name);

            if ( $this -> db -> affected_rows() > 0) return true;

            return false;

        }

        public function add ($data)
        {

            $add_product = $this -> db
                                 -> insert ($this -> table_name, $data);

            if ( $add_product -> affected_rows() > 0) return true;

            return false;

        }

        public function update ($data, $where = array ())
        {

            $update_product = $this -> db
                                    -> where ($where)
                                    -> update ($this -> table_name, $data);

            if ( $this -> db -> affected_rows() > 0) return true;

            return false;

        }

    }

?>