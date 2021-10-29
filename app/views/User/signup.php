<?php //debug($_SESSION['error']); ?>

<div class="container">
    <h2 class="text-center text-warning">Регистрация</h2>
    <div class="d-flex justify-content-center align-items-center container ">
        <div class="row ">
            <form method="post" action="/user/store">
                <div class="form-group mt-3">
                    <label for="login">Login</label>
                    <input class="form-control"
                           type="text"
                           name="login"
                           id="login"
                           placeholder="login"
                           value="<?=isset($_SESSION['form_data']['login']) ? $_SESSION['form_data']['login'] : '';?>">
                    <div id="errors">
                        <?php if (isset($_SESSION['error'])): ?>
                            <?php foreach ($_SESSION['error'] as $value): ?>
                                <?php if(!empty($value['login'])): ?>
                                    <p class="text-danger"><?=$value['login'];?></p>
                                    <?php unset($value['login']); ?>
                                <?php endif; ?>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </div>
                </div>
                <div class="form-group mt-3">
                    <label for="password">Пароль</label>
                    <input class="form-control"
                           type="password"
                           name="password"
                           placeholder="Пароль"
                           value="<?=isset($_SESSION['form_data']['password']) ? $_SESSION['form_data']['password'] : '';?>">
                    <?php if (isset($_SESSION['error'])): ?>
                            <?php foreach ($_SESSION['error'] as $value): ?>
                                <?php if(!empty($value['password'])): ?>
                                    <p class="text-danger"><?=$value['password'];?></p>
                                    <?php unset($value['password']); ?>
                                <?php endif; ?>
                            <?php endforeach; ?>
                    <?php endif; ?>
                </div>
                <div class="form-group mt-3">
                    <label for="confirm_password">Повторите пароль</label>
                    <input class="form-control"
                           type="password"
                           name="confirm_password"
                           placeholder="Повторите пароль"
                           value="<?=isset($_SESSION['form_data']['confirm_password']) ? $_SESSION['form_data']['confirm_password'] : '';?>">
                    <?php if (isset($_SESSION['error'])): ?>
                            <?php foreach ($_SESSION['error'] as $value): ?>
                                <?php if(!empty($value['confirm_password'])): ?>
                                <p class="text-danger"><?=$value['confirm_password'];?></p>
                                    <?php unset($value['confirm_password']); ?>
                                <?php endif; ?>
                            <?php endforeach; ?>
                    <?php endif; ?>
                </div>
                <div class="form-group mt-3">
                    <label for="email">Email</label>
                    <input class="form-control"
                           type="text"
                           name="email"
                           placeholder="Email"
                           value="<?=isset($_SESSION['form_data']['email']) ? $_SESSION['form_data']['email'] : '';?>">
                    <?php if (isset($_SESSION['error'])): ?>
                            <?php foreach ($_SESSION['error'] as $value): ?>
                                <?php if(!empty($value['email'])): ?>
                                <p class="text-danger"><?=$value['email'];?></p>
                                    <?php unset($value['email']); ?>
                                <?php endif; ?>
                            <?php endforeach; ?>
                    <?php endif; ?>
                </div>
                <div class="form-group mt-3">
                    <label for="name">Имя</label>
                    <input class="form-control"
                           type="text"
                           name="name"
                           placeholder="Имя"
                           value="<?=isset($_SESSION['form_data']['name']) ? $_SESSION['form_data']['name'] : '';?>">
                    <?php if (isset($_SESSION['error'])): ?>
                            <?php foreach ($_SESSION['error'] as $value): ?>
                                <?php if(!empty($value['name'])): ?>
                                <p class="text-danger"><?=$value['name'];?></p>
                                    <?php unset($_SESSION['error']); ?>
                                <?php endif; ?>
                            <?php endforeach; ?>
                    <?php endif; ?>
                </div>
                <button class="btn btn-primary">Зарегистрироваться</button>
                <a href="/" class="btn btn-primary">Главная</a>
            </form>
        </div>
    </div>
</div>