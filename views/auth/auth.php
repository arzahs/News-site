<?php require $_SERVER["DOCUMENT_ROOT"]."/views/header.php"?>

<div class="row">
    <form class="col offset-s3 s6">
        <h1>Войти</h1>
        <?php if(isset($register) && $register == true): ?>
        <p>Регистрация успешна</p>
        <?php endif; ?>
        <div class="row">
            <div class="input-field col s12">
                <input id="login" type="text" class="validate">
                <label for="login">Логин</label>
            </div>
            <div class="input-field col s12">
                <input id="password" type="password" class="validate">
                <label for="password">Пароль</label>
            </div>
            <button class="btn btn-big waves-effect waves-light" type="submit" name="action">Войти           </button>
            <a href="register.html" class="btn btn-big waves-effect waves-light red">Регистрация</a>
        </div>
    </form>
</div>

<?php require $_SERVER["DOCUMENT_ROOT"]."/views/footer.php"?>