<?php 

    class Users_model extends CI_Model
    {

        private $table_name = 'users';

        public function __construct()
        {
            
            parent::__construct ();

        }

        public function add_user ($data)
        {

            $add = $this -> db
                         -> insert ($this -> table_name, $data);

            if ( $this -> db -> affected_rows () > 0) return true;

            return false;

        }

    }

?>