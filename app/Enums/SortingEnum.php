<?php


namespace App\Enums;


class SortingEnum extends  BaseEnum
{
    public const DESC = 'desc';
    public const ASC = 'asc';

    protected static array $list = [
        self::DESC => 'desc',
        self::ASC => 'asc',
    ];
}
