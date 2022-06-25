<?php

namespace App\Helpers;

class GenerateHelp
{
    public static function password($lenght=8)
    {
        $password = '';
        $strkey = '012346789abcdfghjkmnpqrtvwxyzABCDFGHJKLMNPQRTVWXYZ';
        for ($i=0; $i<$lenght; $i++) {
            $rand = rand(1, strlen($strkey)-1);
            $password .= $strkey[$rand];
        }
        return $password;
    }
}
