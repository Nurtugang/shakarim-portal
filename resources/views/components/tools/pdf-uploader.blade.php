@props([
    'editor',
    'statePath' => null,
    'config' => [],
])

<x-filament-tiptap-editor::button
    action="openPdfUploadModal()"
    label="{{ __('Вставить PDF') }}"
    icon="heroicon-o-document-arrow-up"
    x-data="{
        openPdfUploadModal() {
            $wire.mountFormComponentAction('{{ $statePath }}', 'uploadPdfForTiptap')
        }
    }"
/>