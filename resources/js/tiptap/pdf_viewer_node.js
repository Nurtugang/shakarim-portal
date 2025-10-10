import { Node, mergeAttributes } from '@tiptap/core';
import { Plugin, PluginKey } from '@tiptap/pm/state'; // Prosemirror state

export const PdfViewerNode = Node.create({
    name: 'pdfViewer', // Уникальное имя ноды

    group: 'block',
    atom: true,
    draggable: true,

    addOptions() {
        return {
            pdfjsViewerUrl: '/pdfjs/web/viewer.html', // Путь к viewer.html
            defaultWidth: '100%',
            defaultHeight: '800px',
            defaultStyle: 'border: 1px solid #ccc;',
        };
    },

    addAttributes() {
        return {
            src: { // URL самого PDF файла
                default: null,
                parseHTML: element => element.querySelector('iframe')?.getAttribute('data-pdf-src'),
            },
            pdfjsViewerUrl: { // URL просмотрщика PDF.js
                default: this.options.pdfjsViewerUrl,
                parseHTML: element => element.querySelector('iframe')?.getAttribute('data-pdfjs-viewer-url'),
            },
            width: {
                default: this.options.defaultWidth,
                parseHTML: element => element.querySelector('iframe')?.getAttribute('width'),
            },
            height: {
                default: this.options.defaultHeight,
                parseHTML: element => element.querySelector('iframe')?.getAttribute('height'),
            },
            style: {
                default: this.options.defaultStyle,
                parseHTML: element => element.querySelector('iframe')?.getAttribute('style'),
            },
        };
    },

    parseHTML() {
        return [
            {
               tag: "iframe",
                getAttrs: domNode => {
                    const iframe = domNode.querySelector('iframe');
                    if (!iframe) return false;
                    return {
                        src: iframe.getAttribute('data-pdf-src'),
                        pdfjsViewerUrl: iframe.getAttribute('data-pdfjs-viewer-url') || this.options.pdfjsViewerUrl,
                        width: iframe.getAttribute('width'),
                        height: iframe.getAttribute('height'),
                        style: iframe.getAttribute('style'),
                    };
                },
            },
        ];
    },

    renderHTML({ HTMLAttributes }) {
        const pdfFileUrl = encodeURIComponent(HTMLAttributes.src);
        const viewerBaseUrl = HTMLAttributes.pdfjsViewerUrl || this.options.pdfjsViewerUrl;
        const iframeSrc = `${viewerBaseUrl}?file=${pdfFileUrl}`;

        return [
            'div',
            { 'data-pdf-viewer-wrapper': '', class: 'pdf-viewer-container' }, // Обёртка
            [
                'iframe',
                mergeAttributes(
                    { // Сохраняем оригинальные данные в data-атрибутах для parseHTML
                        'data-pdf-src': HTMLAttributes.src,
                        'data-pdfjs-viewer-url': viewerBaseUrl,
                    },
                    { // Атрибуты для самого iframe
                        src: iframeSrc,
                        width: HTMLAttributes.width,
                        height: HTMLAttributes.height,
                        style: HTMLAttributes.style,
                        frameborder: '0',
                        // allowfullscreen: true, // если нужно
                    }
                ),
            ],
        ];
    },

    addCommands() {
        return {
            setPdfViewer: (options) => ({ commands }) => {
                if (!options.src) {
                    // Можно добавить обработку ошибки, если src не передан
                    return false;
                }
                console.log('setPdfViewer command called with options:', options);
                return commands.insertContent({
            type: this.name,
            attrs: {
              ...options,
              src: options.src,
            },
          });
            },
        };
    },

    // Плагин для прослушивания события от Filament Action
    addProseMirrorPlugins() {
    
        const extensionThis = this; // Сохраняем ссылку на 'this' ноды
        return [
            new Plugin({
                key: new PluginKey('pdfViewerEventInserter'),
                view: (editorView) => { // editorView - это инстанс редактора Prosemirror

                  
                    const eventHandler = (event) => {
                        const editorWrapper = editorView.dom.closest('.filament-tiptap-editor');

                        if (event.detail && event.detail.pdfUrl) {
                            const { pdfUrl } = event.detail;
                            if (extensionThis.editor) {
                                extensionThis.editor.chain().focus().setPdfViewer({ src: pdfUrl }).run();
                            }
                        }
                    };

                    window.addEventListener('tiptap-insert-pdf-viewer', eventHandler);

                    return {
                        destroy: () => {
                            window.removeEventListener('tiptap-insert-pdf-viewer', eventHandler);
                        },
                    };
                },
            }),
        ];
    },
});