<?php require $_SERVER["DOCUMENT_ROOT"]."/views/header.php"?>

<div class="row">
    <form class="col offset-s3 s6" method="post" action="/auth">
        <h1>Войти</h1>
        <?php if(isset($register) && $register == true): ?>
        <p>Регистрация успешна</p>
        <?php endif; ?>
        <?php if(isset($errors) && $errors != false) foreach($errors as $error): ?>
            <li><?=$error ?></li>
        <?php endforeach; ?>

        <div class="row">
            <div class="input-field col s12">
                <input id="login" type="text" name="login" class="validate" value="<?=$login ?>">
                <label for="login">Логин</label>
            </div>
            <div class="input-field col s12">
                <input id="password" type="password" name="password" class="validate" value="<?=$password ?>">
                <label for="password">Пароль</label>
            </div>
            <button class="btn btn-big waves-effect waves-light" type="submit" name="action">Войти           </button>
            <a href="/auth/register" class="btn btn-big waves-effect waves-light red">Регистрация</a>
        </div>
    </form>
</div>

<?php require $_SERVER["DOCUMENT_ROOT"]."/views/footer.php"?>