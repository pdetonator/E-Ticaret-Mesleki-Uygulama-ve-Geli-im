<?php

    class Register extends CI_Controller
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

        public function add_user ()
        {

            if ( $this -> input -> method ()) {

                $this -> form_validation -> set_error_delimiters ('<li>', '</li>');

                $this -> form_validation -> set_rules ('user-name', 'İsim soyisim', 'required|trim|min_length[3]|max_length[35]');
                $this -> form_validation -> set_rules ('user-email', 'E-posta adresi', 'required|trim|valid_email|is_unique[users.userEmail]');
                $this -> form_validation -> set_rules ('user-password', 'Şifre', 'required|trim|max_length[50]|min_length[5]');
                $this -> form_validation -> set_rules ('user-respassword', 'Şifre', 'match[user-password]');

                if ( $this -> form_validation -> run () == TRUE) {

                    $user_data = array (
                        'userFullName' => htmlspecialchars(trim ($this -> input -> post ('user-name'), TRUE)),
                        'userEmail' => htmlspecialchars(trim ($this -> input -> post ('user-email'), TRUE)),
                        'userPassword' => md5(htmlspecialchars(trim ($this -> input -> post ('user-password'), TRUE))),
                    );

                    if ( $this -> user -> add_user ($user_data)) {

                        $this -> session -> set_flashdata ('sucess', 'Kayıt başarılı, Lütfen giriş yapınız.');

                        redirect (base_url('giris-yap'));

                    }

                }else {

                    $this -> session -> set_flashdata ('error', validation_errors());

                    redirect (base_url ('uye-ol'));

                }

            }

        }

    }

?>