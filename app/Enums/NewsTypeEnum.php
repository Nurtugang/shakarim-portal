<?php
namespace App\Enums;

enum NewsTypeEnum: int
{
    case RESEARCH = 1;
    case NIS_SHARE = 2;

    public function getLabel(): string
    {
        return match ($this) {
            self::RESEARCH => 'Research',
            self::NIS_SHARE => 'NIS/SHARE жаңалықтар',
        };
    }
}