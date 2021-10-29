<div class="container">
    <h2 class="text-center text-warning">Авторизация</h2>
    <?php if (isset($_SESSION['error'])): ?>
        <p class="text-center text-danger"><?=$_SESSION['error'][0];?></p>
        <?php unset($_SESSION['error']); ?>
    <?php endif; ?>
    <div class="d-flex justify-content-center align-items-center container ">
        <div class="row ">
            <form method="post" action="/user/auth">
                <div class="form-group mt-3">
                    <label for="login">Login</label>
                    <input class="form-control"
                           type="text"
                           name="login"
                           placeholder="login"
                           value="<?=isset($_SESSION['form_data']['login']) ? $_SESSION['form_data']['login'] : '';?>">
                </div>
                <div class="form-group mt-3">
                    <label for="password">Пароль</label>
                    <input class="form-control"
                           type="password"
                           name="password"
                           placeholder="Пароль"
                           value="<?=isset($_SESSION['form_data']['password']) ? $_SESSION['form_data']['password'] :'';?>">
                </div>
                <button type="submit" class="btn btn-primary mt-3">Войти</button>
                <a href="/" class="btn btn-primary mt-3">Главная</a>
            </form>
        </div>
    </div>
</div>