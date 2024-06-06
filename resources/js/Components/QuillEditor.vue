<template>
    <div class="quill-editor">
      <div ref="editor"></div>
    </div>
  </template>

  <script>
  import Quill from 'quill';
  import 'quill/dist/quill.core.css';
  import 'quill/dist/quill.snow.css';
  import 'quill/dist/quill.bubble.css';

  export default {
    name: 'QuillEditor',
    props: {
      content: {
        type: String,
        default: ''
      },
      options: {
        type: Object,
        default: () => {}
      }
    },
    data() {
      return {
        quill: null,
        toolbarOptions: [
        ['bold', 'italic', 'underline', 'strike'],        // toggled buttons
        ['blockquote', 'code-block'],
        ['link', 'image', 'video', 'formula'],

        [{ 'header': 1 }, { 'header': 2 }],               // custom button values
        [{ 'list': 'ordered'}, { 'list': 'bullet' }, { 'list': 'check' }],
        [{ 'script': 'sub'}, { 'script': 'super' }],      // superscript/subscript
        [{ 'indent': '-1'}, { 'indent': '+1' }],          // outdent/indent
        [{ 'direction': 'rtl' }],                         // text direction

        [{ 'size': ['small', false, 'large', 'huge'] }],  // custom dropdown
        [{ 'header': [1, 2, 3, 4, 5, 6, false] }],

        [{ 'color': [] }, { 'background': [] }],          // dropdown with defaults from theme
        [{ 'font': [] }],
        [{ 'align': [] }],

        ['clean']                                         // remove formatting button
        ]
      };
    },
    mounted() {
      this.initQuill();
    },
    methods: {
      initQuill() {
        const editor = this.$refs.editor;
        this.quill = new Quill(editor, {
          theme: 'snow',
          ...this.options,
          modules: {
            toolbar: this.toolbarOptions
        },
        });
        this.quill.setContents(this.quill.clipboard.convert(this.content));

        // Emit input event on text change
      this.quill.on('text-change', () => {
        const content = this.quill.root.innerHTML;
        this.$emit('input', content);
      });
      }
    },
    watch: {
    value(newValue) {
      if (this.quill && this.quill.root.innerHTML !== newValue) {
        this.quill.setContents(this.quill.clipboard.convert(newValue));
      }
    }
  }
  };
  </script>

  <style scoped>
  .quill-editor {
    height: 400px;
  }
  </style>
