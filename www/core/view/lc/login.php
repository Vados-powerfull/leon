<div class="login_signup">
    <div class="container login-container pt-5 ">
        <? include("core/view/template/crumbs.php"); ?>
        <h1>Вход в личный кабинет</h1>

        <?
            if (isset($_POST["auth"])) {
                if (!$is_reg)
                {   
                    $mess = '<div class="mb-4"><font color="red">Логин или пароль введен неверно</font></div>';
                }
            }

            $auth_form = '';
            $reg_form = ' hidden';
            $form = 'login';
            if (isset($_POST["reg"])) {
                $pass1 = trim($_POST["pass1"]);
                $pass2 = trim($_POST["pass2"]);
                if ($pass1 != $pass2) {
                    $mess = '<div class="mb-4"><font color="red">Пароли не совпадают</font></div>';
                    $auth_form = ' hidden';
                    $reg_form = '';
                    $form = 'register';
                }
                else {
                    $fio = trim($_POST["fio"]);
                    $phone = trim($_POST["phone"]);
                    $phone = str_replace('8', '7', $phone);
                    $phone = str_replace('+', '', $phone);
                    $email = trim($_POST["email"]);

                    $is_reg = mqo("SELECT id FROM lc_users WHERE phone='".atel($phone)."' OR email='".$email."'");
                    if ($is_reg) {$mess = '<div class="mb-4"><font color="red">Такой пользователь уже зарегистрирован!</font></div>';}
                    else {
                        mqo("INSERT INTO lc_users (fio,phone,email,pass) VALUES ('".$fio."','".atel($phone)."','".$email."','".$pass1."')");
                        $is_reg = mqo("SELECT id FROM lc_users WHERE phone='".$phone."' OR email='".$email."'");
                        if ($is_reg) $mess = '<div class="mb-4"><font color="green">Вы успешно зарегистрировались!</font></div>';
                    }
                }   
            }
            
        ?>
        <div class="<?=$form?>">
            <?=$mess?>
            <div class="login-wrapper<?=$auth_form?>">
                <span class="title">вход</span>
                <a href="#" class="register-btn">Зарегестрироваться</a>
                <form action="/lc" method="POST">
                    <input type="text" placeholder="Ваш телефон или e-mail" name="login">
                    <input type="password" placeholder="Ваш пароль" name="pass">
                    <input type="submit" value="Войти" class="submit" name="auth">
                </form>
                <a href="#" class="forgot-password">Забыли пароль</a>
            </div>
            <div class="register-wrapper<?=$reg_form?>">
                <span class="title">регистрация</span>
                <a href="#" class="register-btn hidden">Зарегестрироваться</a>
                <form action="/lc" class="register-form" method="POST">
                    <input type="text" placeholder="Ваше ФИО" name="fio" required>
                    <input type="tel" id="phone" placeholder="Ваш телефон" name="phone" required>
                    <input type="password" placeholder="Ваш пароль" name="pass1" required>
                    <input type="password" placeholder="Подтверждение пароля" name="pass2" required>
                    <input type="email" placeholder="Ваш e-mail" name="email">
                    <div class="checkbox-container">
                        <input id="terms" type="checkbox">
                        <label for="terms">Я ознакомился и принимаю <a href="#">пользовательское соглашение</a></label>
                    </div>
                    <input type="submit" value="Зарегистрироваться" class="submit" name="reg">
                </form>
                <a href="#" class="forgot-password hidden">Забыли пароль</a>
            </div>
        </div>
    </div>
</div>