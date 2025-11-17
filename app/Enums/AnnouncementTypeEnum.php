<?php

namespace App\Enums;

enum AnnouncementTypeEnum: string
{
    case ANNOUNCEMENT = 'announcement';
    case COMPETITION = 'competition';

    public function getLabel(): string
    {
        return match ($this) {
            self::ANNOUNCEMENT => 'Хабарландыру / Объявление',
            self::COMPETITION => 'Конкурс / Байқау',
        };
    }

    public function getLabelKk(): string
    {
        return match ($this) {
            self::ANNOUNCEMENT => 'Хабарландыру',
            self::COMPETITION => 'Байқау',
        };
    }

    public function getLabelRu(): string
    {
        return match ($this) {
            self::ANNOUNCEMENT => 'Объявление',
            self::COMPETITION => 'Конкурс',
        };
    }

    public function getLabelEn(): string
    {
        return match ($this) {
            self::ANNOUNCEMENT => 'Announcement',
            self::COMPETITION => 'Competition',
        };
    }

    public function getColor(): string
    {
        return match ($this) {
            self::ANNOUNCEMENT => 'blue',
            self::COMPETITION => 'orange',
        };
    }

    public function getIcon(): string
    {
        return match ($this) {
            self::ANNOUNCEMENT => 'heroicon-o-megaphone',
            self::COMPETITION => 'heroicon-o-trophy',
        };
    }

    public static function getOptions(): array
    {
        return [
            self::ANNOUNCEMENT->value => self::ANNOUNCEMENT->getLabel(),
            self::COMPETITION->value => self::COMPETITION->getLabel(),
        ];
    }
}
