<!doctype html>
<html lang="ru">
<head>
    <!-- Обязательные метатеги -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/app.css" rel="stylesheet">
    <title>Hello, world!</title>
</head>
<body>

<nav class="navbar navbar-expand-md navbar-dark bg-dark mb-4">
    <div class="container">
        <a class="navbar-brand" href="#">Navbar</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="#">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Link</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-expanded="false">
                        Dropdown
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="#">Action</a></li>
                        <li><a class="dropdown-item" href="#">Another action</a></li>
                        <li><hr class="dropdown-divider"></li>
                        <li><a class="dropdown-item" href="#">Something else here</a></li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Disabled</a>
                </li>
            </ul>
        </div>
        <div class="d-flex">
            <?php if(auth()->guard()->guest()): ?>
                <div class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">Подать объявление</div>
            <?php endif; ?>
            <?php if(auth()->guard()->check()): ?>
                <a href="<?php echo e(route('profile.index')); ?>" class="btn btn-success"><?php echo e(Auth::user()->email); ?></a>
                <a href="<?php echo e(route('logout')); ?>" class="btn btn-light">Выход</a>
            <?php endif; ?>
        </div>
    </div>
</nav>

<?php echo $__env->yieldContent('content'); ?>

<?php if(auth()->guard()->guest()): ?>
    <!-- Модальное окно -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Вход/Регистрация</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <nav>
                        <div class="nav nav-tabs" id="nav-tab" role="tablist">
                            <a class="nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-auth" role="tab" aria-controls="nav-auth" aria-selected="true">Вход</a>
                            <a class="nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-register" role="tab" aria-controls="nav-register" aria-selected="false">Регистрация</a>
                        </div>
                    </nav>
                    <div class="tab-content pt-3" id="nav-tabContent">
                        <div class="tab-pane fade show active" id="nav-auth" role="tabpanel" aria-labelledby="nav-home-tab">
                            <form action="<?php echo e(route('api.login')); ?>" method="post" id="formLogin">
                                <?php echo csrf_field(); ?>
                                <div class="form-group">
                                    <input type="email" name="email" class="form-control" id="email" placeholder="Ваш e-mail">
                                    <small id="emailErr" class="form-text text-danger d-none"></small>
                                </div>
                                <div class="form-group">
                                    <input type="password" name="password" class="form-control" id="password" placeholder="Ваш пароль">
                                    <small id="passwordErr" class="form-text text-danger d-none"></small>
                                </div>
                                <button type="submit" class="btn btn-success btn-block">Войти</button>
                            </form>
                        </div>
                        <div class="tab-pane fade" id="nav-register" role="tabpanel" aria-labelledby="nav-profile-tab">
                            <form action="<?php echo e(route('api.register')); ?>" method="post" id="formRegister">
                                <?php echo csrf_field(); ?>
                                <div class="form-group">
                                    <input type="email" name="email" class="form-control" id="emailReg" placeholder="Ваш e-mail">
                                    <small id="emailRegErr" class="form-text text-danger d-none"></small>
                                </div>
                                <i class="bi bi-alarm"></i>
                                <button type="submit" class="btn btn-success btn-block">Зарегистрироваться</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php endif; ?>

<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/app.js"></script>

</body>
</html>
<?php /**PATH D:\OpenServer\domains\ads.loc\resources\views/layouts/app.blade.php ENDPATH**/ ?>