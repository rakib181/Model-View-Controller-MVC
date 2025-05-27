<?php

namespace Core;

class Session
{
    public static function start(): void
    {
        session_start();
    }
    public static function has($key)
    {
        return static::get($key);
    }

    public static function put($key, $value): void
    {
        $_SESSION[$key] = $value;
    }
    public static function get($key, $default = null)
    {
        return $_SESSION['_flash'][$key] ?? $_SESSION[$key] ?? $default;
    }

    public static function flash($key, $value): void
    {
        $_SESSION['_flash'][$key] = $value;
    }

    public static function unflash(): void
    {
        unset($_SESSION['old']);
        unset($_SESSION['_flash']);
    }

    public static function flush(): void
    {
        $_SESSION = [];
    }
    public static function destroy(): void
    {
        session_destroy();

        $params = session_get_cookie_params();

        setcookie("PHPSESSID", "", time() - 3600, $params["path"], $params["domain"], $params["secure"], $params["httponly"]);
    }

    public static function refresh(): void
    {
        session_regenerate_id(true);
    }


}