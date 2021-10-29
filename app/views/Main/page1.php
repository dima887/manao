<h3 class="text-success">Страница 1</h3>
<?php if (isset($_SESSION['user'])): ?>
    <p>Hello <?=$_SESSION['user']['name']; ?></p>
    <a class="btn btn-success" href="/">Главная</a>
    <a class="btn btn-success" href="/main/page1">Страница 1</a>
    <a class="btn btn-success" href="/main/page2">Страница 2</a>
    <a class="btn btn-success" href="/user/logout">Выйти</a>
<?php endif; ?>

