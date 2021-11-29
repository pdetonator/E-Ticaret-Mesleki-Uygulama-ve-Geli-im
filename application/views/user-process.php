<div class="body">
    <div class="container-fluid form-container">
        <div class="user__form">
            <div class="form__links">
                <ul>
                    <li class="<?php login_active()?> tab__link">Giriş Yap</li>
                    <li class="<?php register_active()?> tab__link">Üye Ol</li>
                </ul>
            </div>
            <div class="forms">
                <div class="login__form form__user <?php login_active()?>">
                <?php if ( $this -> session -> has_userdata ('sucess')) : ?>
                <div class="validation__errors success">
                    <ul>
                        <?=$this -> session -> flashdata ('sucess');?>
                    </ul>
                </div>
                <?php elseif ( $this -> session -> has_userdata ('error')) : ?>
                <div class="validation__errors error">
                    <ul>
                        <?=$this -> session -> flashdata ('error');?>
                    </ul>
                </div>
                <?php endif; ?>
                    <form action="<?=base_url('login/user_login')?>" method="post">
                        <div class="input__group">
                            <label for="login-mail">E-Mail</label>
                            <input type="text" name="user-email" id="login-mail" placeholder="ad.soyad@example.com">
                        </div>
                        <div class="input__group">
                            <label for="login-password">Şifre</label>
                            <div class="show__input">
                                <input type="password" name="user-password" id="login-password" placeholder="****">
                                <i class="fa fa-eye show-password" aria-hidden="true"></i>
                            </div>
                        </div>
                        <button type="submit" id="login-btn" name="login-btn">GİRİŞ YAP</button>
                    </form>
                </div>
                <div class="<?php register_active()?> register__form form__user">
                    <?php if ( $this -> session -> has_userdata ('error')) : ?>
                    <div class="validation__errors error">
                        <ul>
                            <?=$this -> session -> flashdata ('error');?>
                        </ul>
                    </div>
                    <?php endif; ?>
                    <form action="<?=base_url('register/user_register')?>" method="post">
                        <div class="input__group">
                            <label for="register-name">İsim Soyisim</label>
                            <input type="text" name="user-name" id="register-mail" placeholder="ad soyad">
                        </div>
                        <div class="input__group">
                            <label for="register-mail">E-Mail</label>
                            <input type="text" name="user-email" id="register-mail" placeholder="ad.soyad@example.com">
                        </div>
                        <div class="input__group">
                            <label for="register-password">Şifre</label>
                            <div class="show__input">
                                <input type="password" name="user-password" id="register-password" placeholder="****">
                                <i class="fa fa-eye show-password" aria-hidden="true"></i>
                            </div>
                        </div>
                        <div class="input__group">
                            <label for="regiter-repassword">Şifre(Tekrar)</label>
                            <div class="show__input">
                                <input type="password" name="user-repassword" id="register-repassword" placeholder="****">
                                <i class="fa fa-eye show-password" aria-hidden="true"></i>
                            </div>
                        </div>
                        <button type="submit" id="login-btn" name="login-btn">KAYIT OL</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="https://unpkg.com/swiper@7/swiper-bundle.min.js"></script>
<script src="assets/js/index.js"></script>
<script>
    let showBtn = document.querySelectorAll('.show-password');
    let tabLinks = document.querySelectorAll('.tab__link');
    let tabContent = document.querySelectorAll('.form__user')

    function removeAllActives(item) {
        item.forEach(link => {
           link.classList.remove('active');
        });
    }

    tabLinks.forEach((item, key) => {
        item.addEventListener('click', e => {
            removeAllActives(tabLinks);
            removeAllActives(tabContent);
            e.target.classList.add('active');
            tabContent[key].classList.add('active');
        });
    });

    showBtn.forEach(btn => {
        btn.addEventListener('click', e => {
            let thisInput = e.target.closest('.show__input').children[0];

            if (thisInput.getAttribute('type') === 'text') thisInput.setAttribute('type', 'password');
            else {
                thisInput.setAttribute('type', 'text');
            }
        });
    });
</script>
</body>
</html>