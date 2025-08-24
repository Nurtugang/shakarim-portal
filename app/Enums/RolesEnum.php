<?php
namespace App\Enums;

enum RolesEnum: string
{
    case ADMIN = 'admin';
    case USER = 'user';
    case PRESS = 'press';
    case STRUCTURE = 'structure';

    public function getLabel(): string
    {
        return match ($this) {
            self::ADMIN => 'Админ',
            self::USER => 'Пользователь',
            self::PRESS => 'Пресс-служба',
            self::STRUCTURE => 'Структура',
        };
    }
}