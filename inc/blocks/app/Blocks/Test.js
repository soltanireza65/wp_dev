const { registerBlockType } = wp.blocks;
const { __ } = wp.i18n;
const { InspectorControls } = wp.editor;

registerBlockType("pystore/blockname", {
  title: __("Test", "_themename"),
  description: "Block Desc .",
  category: "common",
  icon: "dashicons-dashboard",
  keywords: [__("Key 1"), __("Key 2")],
  supports: {
    html: false,
    align: true,
  },
  attributes: {
    content: {
      type: "string",
      source: "text",
    },
  },
  edit: (props) => {
    return [<InspectorControls>Hello</InspectorControls>, <h2>{props.attribute.content}</h2>];
  },
  save: (props) => {
    return <h2>My Frontend</h2>;
  },
});
