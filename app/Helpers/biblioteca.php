<?php
if (!function_exists('getMenuAtivo')) {
    function getMenuAtivo($rota)
    {
        if (request()->is($rota) || request()->is($rota . '/*')) {
            return 'active';
        } else {
            return '';
        }
    }
} 