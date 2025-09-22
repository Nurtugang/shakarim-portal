<?php

namespace App\Livewire;

use Livewire\Component;

class LanguageSelector extends Component
{
    public $currentLanguage;

    // Массив с кодами языков и их отображаемыми именами
    // Это "единый источник правды", что очень удобно
    public array $languages = [
        'kk' => 'ҚАЗ',
        'ru' => 'РУС',
        'en' => 'ENG',
        'cn' => '中文',
    ];

    public function mount()
    {
        $this->currentLanguage = session('locale', 'kk');
    }

    public function changeLanguage($language)
    {
        if (!array_key_exists($language, $this->languages)) {
            return;
        }

        $this->currentLanguage = $language;
        session()->put('locale', $language);
        $this->dispatch('language-changed', ['language' => $language]);
    }

    public function render()
    {
        return view('livewire.language-selector');
    }
}