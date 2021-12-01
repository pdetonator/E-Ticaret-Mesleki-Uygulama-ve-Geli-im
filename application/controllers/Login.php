<?php 

    class Login extends CI_Controller
    {

        public function __construct()
        {

            parent::__construct ();

            login_redirect();

            $this -> load -> model ('Users_model', 'user');

            $this -> load -> library ('form_validation');
            $this -> load -> helper ('date');

        }

        public function index ()
        {

            $this -> load -> view ('meta/meta1');
            $this -> load -> view ('header_nav');

            $this -> load -> view ('user-process');

        }

        public function user_login ()
        {

            if ( $this -> input -> method ()) {

                $this -> form_validation -> set_error_delimiters ('<li>', '</li>');

                $this -> form_validation -> set_rules ('user-email', 'E-posta adresi', 'required|trim|valid_email');
                $this -> form_validation -> set_rules ('user-password', 'Şifre', 'required|trim');

                if ( $this -> form_validation -> run () == TRUE) {

                    $user_data = array (
                        'userEmail' => htmlspecialchars(trim ($this -> input -> post ('user-email', TRUE))),
                        'userPassword' => md5(htmlspecialchars(trim ($this -> input -> post ('user-password', TRUE)))),
                    );

                    if ( $this -> user -> get_user ($user_data) -> num_rows () > 0) {

                        $this -> session -> set_userdata ('user', array (
                            'login' => TRUE,
                            'userID' => $this -> user -> get_user ($user_data) -> row () -> userID,
                            'lastLoginTime' => mdate ('%Y-%m-%d %h:%i %a')
                        ));

                        $this -> session -> set_flashdata ('login', 'Giriş başarılı, alışverişe başlayabilirsiniz.');

                        redirect ( base_url());

                        
                    }else {

                        $this -> session -> set_flashdata ('error', '<li>E-posta adresi veya şifre hatalı!</li>');

                        redirect(base_url('giris-yap'));

                    }

                }else {

                    $this -> session -> set_flashdata ('error', validation_errors());

                    redirect(base_url('giris-yap'));

                }
 
            }else {

                show_404();

            }

        }

    }

?>