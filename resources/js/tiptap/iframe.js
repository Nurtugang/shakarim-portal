import { Node, mergeAttributes } from "@tiptap/core";

export const iframe = Node.create({
  name: "iframe",

  selectable: true,
  draggable: true,
  atom: true,

  addOptions() {
    console.log('Iframe options initialized');
    return {
      inline: false,
      HTMLAttributes: {},
      width: 1600,
      height: 900,
    };
  },

  inline() {
    return this.options.inline;
  },

  group() {
    return this.options.inline ? "inline" : "block";
  },

  addAttributes() {
    return {
      style: {
        default: null,
        parseHTML: (element) => element.getAttribute("style"),
      },
      src: {
        default: null,
      },
      frameborder: {
        default: 0,
      },
      width: {
        default: this.options.width,
        parseHTML: (element) => element.getAttribute("width"),
      },
      height: {
        default: this.options.height,
        parseHTML: (element) => element.getAttribute("height"),
      },
      responsive: {
        default: true,
        parseHTML: () => true,
      },
      'data-aspect-width': {
        default: null,
        parseHTML: (element) => element.getAttribute("data-aspect-width"),
      },
      'data-aspect-height': {
        default: null,
        parseHTML: (element) => element.getAttribute("data-aspect-height"),
      },
    };
  },

  parseHTML() {
    return [
      {
        tag: "iframe",
      },
    ];
  },

  addCommands() {
    return {
      setIframe:
        (options) =>
        ({ commands }) => {
          const srcValue = prompt('Введите url адрес:', options.src);
          return commands.insertContent({
            type: this.name,
            attrs: {
              ...options,
              src: srcValue,
            },
          });
        },
    };
  },

  renderHTML({ HTMLAttributes }) {

    return [
      "div",
      {
        "data-iframe": "",
        class: HTMLAttributes.responsive ? "responsive" : null
      },
      [
        "iframe",
        {
          src: HTMLAttributes.src,
          width: HTMLAttributes.width,
          height: HTMLAttributes.height,
          allowfullscreen: this.options.allowFullscreen,
          style:  `aspect-ratio: ${HTMLAttributes['data-aspect-width']} / ${HTMLAttributes['data-aspect-height']}; width: 100%; height: auto;`,
          'data-aspect-width': HTMLAttributes['data-aspect-width'],
          'data-aspect-height': HTMLAttributes['data-aspect-height'],
        },
      ],
    ];
  },
});
