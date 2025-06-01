<?php

namespace App\CustomTiptapExtensions;

use Tiptap\Core\Node;
use Tiptap\Utils\HTML;

class PdfViewerPhpNode extends Node
{
    public static $name = 'pdfViewer'; // Должно совпадать с именем в JS

    public function addOptions(): array
    {
        return [
            'pdfjsViewerUrl' => '/pdfjs/web/viewer.html', // URL по умолчанию для PDF.js viewer
            'HTMLAttributes' => [ // Атрибуты по умолчанию для iframe
                'width' => '100%',
                'height' => '800px',
                'style' => 'border: 1px solid #ccc;',
                'frameborder' => '0',
            ],
        ];
    }

    public function addAttributes(): array
    {
        return [
            'src' => [ // URL самого PDF файла
                'default' => null,
                'parseHTML' => static function ($DOMNode) {
                    // Ищем iframe внутри div[data-pdf-viewer-wrapper]
                //    dd($DOMNode->getAttribute('data-pdf-src'));
                //    $iframe = $DOMNode->querySelector('iframe');
                    return $DOMNode->getAttribute('data-pdf-src');
                },
            ],
            'pdfjsViewerUrl' => [ // URL просмотрщика
                'default' => $this->options['pdfjsViewerUrl'],
                'parseHTML' => static function ($DOMNode) {
                //     $iframe = $DOMNode->querySelector('iframe');
                //     return $iframe ? $iframe->getAttribute('data-pdfjs-viewer-url') : null;

                     return $DOMNode->getAttribute('data-pdfjs-viewer-url');
                },
            ],
            'width' => [
                'default' => $this->options['HTMLAttributes']['width'],
                'parseHTML' => static function ($DOMNode) {
                  //  $iframe = $DOMNode->querySelector('iframe');
                  //  return $iframe ? $iframe->getAttribute('width') : null;

                    return $DOMNode->getAttribute('width');
                },
            ],
            'height' => [
                'default' => $this->options['HTMLAttributes']['height'],
                'parseHTML' => static function ($DOMNode) {
                  //  $iframe = $DOMNode->querySelector('iframe');
                  //  return $iframe ? $iframe->getAttribute('height') : null;
                    return $DOMNode->getAttribute('height');
                },
            ],
            'style' => [
                'default' => $this->options['HTMLAttributes']['style'],
                'parseHTML' => static function ($DOMNode) {
                  //  $iframe = $DOMNode->querySelector('iframe');
                  //  return $iframe ? $iframe->getAttribute('style') : null;
                    return $DOMNode->getAttribute('style');
                },
            ],
        ];
    }

    public function parseHTML(): array
    {
        return [
            [
                'tag' => 'iframe',
            ],
        ];
    }

    public function renderHTML($node, $HTMLAttributes = []): array
    {
        
        $pdfFileUrl = urlencode($node->attrs->src ?? '');
        $viewerBaseUrl = $node->attrs->pdfjsViewerUrl ?? $this->options['pdfjsViewerUrl'];
        $iframeSrc = "{$viewerBaseUrl}?file={$pdfFileUrl}";

        $finalIframeAttrs = HTML::mergeAttributes($this->options['HTMLAttributes'], [
            'src' => $iframeSrc,
            'data-pdf-src' => $node->attrs->src, // Сохраняем для parseHTML
            'data-pdfjs-viewer-url' => $viewerBaseUrl, // Сохраняем для parseHTML
            'width' => $node->attrs->width ?? $this->options['HTMLAttributes']['width'],
            'height' => $node->attrs->height ?? $this->options['HTMLAttributes']['height'],
            'style' => $node->attrs->style ?? $this->options['HTMLAttributes']['style'],
        ]);

    //    dd($finalIframeAttrs);
        
        // $HTMLAttributes здесь это атрибуты для div-обёртки
        $wrapperAttrs = HTML::mergeAttributes($HTMLAttributes, [
            'data-pdf-viewer-wrapper' => '', 
            'class' => 'pdf-viewer-container' // Можно добавить класс для стилизации
        ]);

        return [
            'div', // Обёртка
            $wrapperAttrs,
            ['iframe', $finalIframeAttrs], // Сам iframe
        ];
    }
}