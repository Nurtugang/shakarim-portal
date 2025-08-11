<?php

namespace App\Livewire;

use Livewire\Component;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\FileUpload;
use Illuminate\Support\Facades\App;
use App\Models\FormSchema;
use App\Models\PageFormSchema;
use App\Models\PageRequest;

class DynamicForm extends Component implements HasForms
{
    use InteractsWithForms;

    public $formSchemaId;
    public $formSchema;
    public $formTitle;
    public array $data = [];

    public function mount($formSchemaId)
    {
        $this->formSchemaId = $formSchemaId;
        $this->formSchema = PageFormSchema::findOrFail($this->formSchemaId);

        $locale = App::getLocale();
        $titleKey = 'title_' . $locale;
        $this->formTitle = $this->formSchema->{$titleKey} ?? $this->formSchema->title_ru ?? 'Форма';
    }

    protected function getFormSchema(): array
    {
        $schema = [];
        $locale = App::getLocale();

        foreach ($this->formSchema->form_schema ?? [] as $index => $field) {
            $key = $field['key'];
            $labelKey = 'name_' . $locale;
            $label = $field[$labelKey] ?? $field['name_ru'] ?? 'Поле';

            switch ($field['type']) {
                case 'text':
                case 'email':
                case 'tel':
                    $component = TextInput::make("data.$key")
                        ->label($label)
                        ->required($field['required']);

                    if ($field['type'] === 'email') {
                        $component->email();
                    } elseif ($field['type'] === 'tel') {
                        $component->tel();
                    }

                    $schema[] = $component;
                    break;

                case 'textarea':
                    $schema[] = Textarea::make("data.$key")
                        ->label($label)
                        ->required(false);
                    break;

                case 'file':
                    $schema[] = FileUpload::make("data.$key")
                        ->label($label)
                        ->directory('page_files')
                        ->required($field['required'] ?? false);
                    break;
            }
        }

        return $schema;
    }


    public function submit()
    {
        $validated = $this->form->getState();

        PageRequest::create([
            'page_id' => $this->formSchema->page_id,
            'data' => $validated['data'],
        ]);

        session()->flash('success', 'Форма отправлена!');
        $this->reset('data');
    }

    public function render()
    {
        return view('livewire.dynamic-form');
    }
}