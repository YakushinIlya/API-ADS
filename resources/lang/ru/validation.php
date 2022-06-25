<?php
 return [
     'custom' => [
         'email' => [
             'required' => 'Заполните e-mail',
             'email'    => 'Неверный формат e-mail',
             'unique'   => 'Ваш e-mail возможно уже существует',
         ],
         'password' => [
             'required' => 'Заполните пароль',
             'string'   => 'Неверный формат пароля',
         ],
     ],
 ];
