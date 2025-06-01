<?php
namespace App\Enums;

enum RolesEnum: string
{
    case ADMIN = 'admin';
    case USER = 'user';

    public function getLabel(): string
    {
        return match ($this) {
            self::ADMIN => 'Админ',
            self::USER => 'Пользователь',
        };
    }
}