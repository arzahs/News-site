<?php require $_SERVER["DOCUMENT_ROOT"]."/views/header.php"; ?>
<div class="col s12">
    <h2 class="center-align">Добавить новость</h2>
    <form class="add-news" action="">
        <div class="input-field col s12">
            <input id="title_news" type="text" class="validate" name="title">
            <label for="title_news">Название новости</label>
        </div>
        <div class="input-field col s12">
            <textarea id="editor" class="materialize-textarea" name="article"></textarea>
            <label for="editor">Текст</label>
        </div>
        <div class="input-field col s12">
            <select name="category">
                <?php foreach($categories as $category): ?>
                    <option value="<?=$category["id"]?>"><?=$category["name"]?></option>
                <?php endforeach; ?>
            </select>
            <label>Выберите категорию</label>
        </div>
        <div class="file-field input-field">
            <div class="btn">
                <span>Добавить фото</span>
                <input type="file">
            </div>
            <div class="file-path-wrapper">
                <input class="file-path validate" type="text" name="path">
            </div>
        </div>

        <button class="btn btn-big waves-effect waves-light" type="submit" name="action">Опубликовать</button>
    </form>
</div>
<?php require $_SERVER["DOCUMENT_ROOT"]."/views/footer.php"; ?>
