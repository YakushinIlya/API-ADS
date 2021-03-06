<?php

return [
    'user' => [
        'register' => [
            'password' => [
                'lenght' => 8,
            ],
            'message' => [
                'success' => 'Вы успешно зарегистрированы.<br> Проверьте ваш e-mail адрес.',
                'error'   => 'Не удалось зарегистрироваться.',
            ],
        ],
        'auth' => [
            'message' => [
                'error_in' => 'Не удалось войти',
            ],
        ],
    ],
    'admin' => [
        'email' => 'admin@ads.loc',
        'first_name' => 'John',
        'last_name' => 'Smith',
    ],
];
