<?php require $_SERVER["DOCUMENT_ROOT"]."/views/header.php" ?>
<div class="row">
    <form class="col offset-s3 s6" method="post" action="/auth/register">
        <h1>Регистрация</h1>
        <div class="row">
            <?php if(isset($errors) && $errors != false) foreach($errors as $error): ?>
                <li><?=$error ?></li>
            <?php endforeach; ?>
            <div class="input-field col s6">
                <input id="first_name" type="text" name="first_name" class="validate" value="<?=$first_name ?>">
                <label for="first_name">Имя</label>
            </div>
            <div class="input-field col s6">
                <input id="last_name" type="text" name="last_name" class="validate" value="<?=$last_name ?>">
                <label for="last_name">Фамилия</label>
            </div>
        </div>
        <div class="row">
            <div class="input-field col s12">
                <input id="login" type="text" name="login" class="validate" value="<?=$login ?>">
                <label for="login">Логин</label>
            </div>
        </div>
        <div class="row">
            <div class="input-field col s12">
                <input id="password" type="password" name="password" class="validate" value="<?=$password ?>">
                <label for="password">Пароль</label>
            </div>
        </div>
        <div class="row">
            <div class="input-field col s12">
                <input id="email" type="email" name="email" class="validate" value="<?=$email ?>">
                <label for="email">Email</label>
            </div>
        </div>
        <button class="btn btn-big waves-effect waves-light" type="submit" name="action">Зарегестрироваться</button>
    </form>
</div>

<?php require $_SERVER["DOCUMENT_ROOT"]."/views/footer.php" ?>