<?php

namespace App\Livewire;

use Livewire\Component;

class LanguageSelector extends Component
{
    public $currentLanguage;

    public $languages = [
        'kk' => 'kz',
        'ru' => 'ru',
        'en' => 'en',
        'cn' => 'cn',
    ];
    
    public function mount()
    {
        // Инициализируем текущий язык из сессии или задаем значение по умолчанию
        $this->currentLanguage = session('locale', 'kk');
    }

    public function changeLanguage($language)
    {
        $this->currentLanguage = $language;

        // Логика, например, сохранение выбранного языка в сессии
        session()->put('locale', $language);

        $this->dispatch('language-changed', ['language' => $language]);

       // return redirect(request()->header('Referer'));
    }

    public function render()
    {
        return view('livewire.language-selector');
    }
}
