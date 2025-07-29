<?php
namespace App\Enums;

enum SciencePurchasesEnum: int
{
    case STATUS_DELIVERY = 0;
    case STATUS_DELIVERED = 1;
    case STATUS_IN_STOCK = 2;

    public function label(): string
    {
        return match ($this) {
            self::STATUS_DELIVERY => 'В период поставки',
            self::STATUS_DELIVERED => 'Поставлено',
            self::STATUS_IN_STOCK => 'В наличии',
        };
    }
}