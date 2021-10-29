<?php if (isset($_SESSION['user'])): ?>
    <h3 class="text-success">Вы вошли в систему!</h3>
    <p>Hello <?=$_SESSION['user']['name']; ?></p>
    <a class="btn btn-success" href="/">Главная</a>
    <a id="page1" class="btn btn-success" href="/main/page1">Страница 1</a>
    <a class="btn btn-success" href="/main/page2">Страница 2</a>
    <a class="btn btn-success" href="/user/logout">Выйти</a>
<?php else: ?>
    <h3 class="text-primary">Авторизуйтесь или зарегистрируйтесь!</h3>
    <a class="btn btn-success" href="/user/login">Войти</a>
    <a class="btn btn-success" href="/user/signup">Регистрация</a>
    <a class="btn btn-success" href="/user/deleteCookie">Очистить куки</a>
<?php endif; ?>


