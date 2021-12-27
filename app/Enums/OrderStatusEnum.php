<?php

declare(strict_types=1);

namespace App\Enums;


class OrderStatusEnum extends BaseEnum
{
    public const NEW = 0;
    public const IN_PROCESSING = 1;
    public const PROCESSED  = 2;
    public const CLOSED = 3;

    protected static array $list = [
        self::NEW => 'New',
        self::IN_PROCESSING => 'In processing',
        self::PROCESSED => 'Processed',
        self::CLOSED => 'Closed',
    ];
}
