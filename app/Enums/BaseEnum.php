<?php

declare(strict_types=1);


namespace App\Enums;


class BaseEnum
{
    protected static array $list = [];

    public static function get($key, $default = null): mixed
    {
        return  static::$list[$key] ?? $default;
    }


    public static function getList(): array
    {
        return  static::$list;
    }
}
