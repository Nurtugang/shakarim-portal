<?php
namespace App\Enums;

enum RolesEnum: string
{
    case ADMIN = 'admin';
    case USER = 'user';
    case PRESS = 'press';
    case STRUCTURE = 'structure';
    case SCIENCE = 'science';
    case DEVELOPMENT = 'development';
    case CAMPUS_LIFE = 'campus_life';

    public function getLabel(): string
    {
        return match ($this) {
            self::ADMIN => 'Админ',
            self::USER => 'Пользователь',
            self::PRESS => 'Пресс-служба',
            self::STRUCTURE => 'Структура',
            self::SCIENCE => 'Наука',
            self::DEVELOPMENT => 'ЦУР',
            self::CAMPUS_LIFE => 'Campus Life',
        };
    }
}