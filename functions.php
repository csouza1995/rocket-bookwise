<?php

if (!function_exists('dd')) {
    function dd(...$data)
    {
        echo '<pre style="background-color: #212121; color: #f8f8f2; padding: 10px; border-radius: 5px; margin: 10px;">';

        $separator = (php_sapi_name() === 'cli') ? PHP_EOL : '<br/>';
        $bt = debug_backtrace();
        $caller = array_shift($bt);
        $args = func_get_args();

        echo $caller['file'] . ':' . $caller['line'] . $separator . PHP_EOL;

        call_user_func_array('var_dump', $args);
        echo '</pre>';

        die();
    }
}

if (!function_exists('dump')) {
    function dump(...$data)
    {
        echo '<pre style="background-color: #212121; color: #f8f8f2; padding: 10px; border-radius: 5px; margin: 10px;">';

        $separator = (php_sapi_name() === 'cli') ? PHP_EOL : '<br/>';
        $bt = debug_backtrace();
        $caller = array_shift($bt);
        $args = func_get_args();

        echo $caller['file'] . ':' . $caller['line'] . $separator . PHP_EOL;

        call_user_func_array('var_dump', $args);
        echo '</pre>';
    }
}

if (!function_exists('view')) {
    function view(string $view, array $data = [], string $layout = 'app')
    {
        extract($data);

        $view = str_replace('.', '/', $view);
        if (!file_exists("views/{$view}.view.php")) {
            abort(404);
        }

        $layout = str_replace('.', '/', $layout);
        if (!file_exists("views/layouts/{$layout}.layout.php")) {
            abort(404);
        }

        require "views/layouts/{$layout}.layout.php";
    }
}

if (!function_exists('redirect')) {
    function redirect(string $url)
    {
        header("Location: {$url}");
        exit();
    }
}

if (!function_exists('abort')) {
    function abort($code)
    {
        http_response_code($code);
        view("errors.{$code}", ['code' => $code], 'error');
        die();
    }
}

if (!function_exists('config')) {
    function config(?string $key = null)
    {
        $config = require 'config/config.php';
        return $key ? $config[$key] : $config;
    }
}

if (!function_exists('old')) {
    $currentOld = [];

    function old(string $field, $default = '')
    {
        global $currentOld;

        if (empty($currentOld)) {
            $currentOld = Session::get('old') ?? [];
        }

        return $currentOld[$field] ?? $default;
    }
}

if (!function_exists('errors')) {
    $currentErrors = [];

    function errors(?string $field = null): ?array
    {
        global $currentErrors;

        if (empty($currentErrors)) {
            $currentErrors = Session::get('errors') ?? [];
        }

        return $field ? $currentErrors[$field] : $currentErrors;
    }
}

if (!function_exists('error')) {
    function error(string $field): ?string
    {
        return errors($field)[0] ?? null;
    }
}

if (!function_exists('auth')) {
    function auth()
    {
        return Session::get('auth');
    }
}
