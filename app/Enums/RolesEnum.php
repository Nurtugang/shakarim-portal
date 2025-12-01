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
    case EDUCATION = 'education';
    case COURSE = 'course';
    case DIPLOMA_ACCESS = 'diploma_access';

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
            self::EDUCATION => 'Образование',
            self::COURSE => 'Курсы',
            self::DIPLOMA_ACCESS => 'Доступ к реестру дипломов',
        };
    }
}