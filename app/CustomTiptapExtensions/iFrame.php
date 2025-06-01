<?php

namespace App\CustomTiptapExtensions;

use Tiptap\Core\Node;
use Tiptap\Utils\HTML;

class iFrame extends Node
{
    public static $name = 'iframe';

    public function addOptions(): array
    {
        return [
            'inline' => false,
            'HTMLAttributes' => [],
            'allowFullscreen' => true,
            'width' => 640,
            'height' => 480,
        ];
    }

    public function addAttributes(): array
    {
        return [
            'style' => [
                'default' => null,
                'parseHTML' => function ($DOMNode) {
                    return $DOMNode->getAttribute('style');
                },
            ],
            'src' => [
                'default' => null,
                'parseHTML' => function ($DOMNode) {
                    return $DOMNode->getAttribute('src');
                },
            ],
            'frameborder' => [
                'default'=> 0,
            ],
            'width' => [
                'default' => $this->options['width'],
                'parseHTML' => function ($DOMNode) {
                    return $DOMNode->getAttribute('width');
                },
            ],
            'height' => [
                'default' => $this->options['height'],
                'parseHTML' => function ($DOMNode) {
                    return $DOMNode->getAttribute('height');
                },
            ],
            'responsive' => [
                'default' => true,
                'parseHTML' => function ($DOMNode) {
                    return str_contains($DOMNode->getAttribute('class'), 'responsive') ?? false;
                },
            ],
            'data-aspect-width' => [
                'default' => null,
                'parseHTML' => function ($DOMNode) {
                    return $DOMNode->getAttribute('width');
                },
            ],
            'data-aspect-height' => [
                'default' => null,
                'parseHTML' => function ($DOMNode) {
                    return $DOMNode->getAttribute('height');
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
        return [
            'div',
            [
                'data-ifarme' => true,
                'class' => $node->attrs->responsive ? 'responsive' : null,
            ],
            [
                'iframe',
                HTML::mergeAttributes($this->options['HTMLAttributes'], [
                    'src' => $node->attrs->src,
                    'width' => $node->attrs->width ?? $this->options['width'],
                    'height' => $node->attrs->height ?? $this->options['height'],
                    'allowfullscreen' => true,
                    'style' => $node->attrs->responsive
                        ? "aspect-ratio:{$node->attrs->width}/{$node->attrs->height}; width: 100%; height: auto;"
                        : null,
                ]),
                0,
            ],
        ];
    }
}
