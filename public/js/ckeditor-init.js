(function () {
    const editorElement = document.querySelector('#editor');

    if (!editorElement) {
        return;
    }

    const {
        ClassicEditor,
        Autosave,
        Essentials,
        Paragraph,
        Alignment,
        AutoImage,
        Autoformat,
        AutoLink,
        ImageBlock,
        BlockQuote,
        Bold,
        Code,
        CodeBlock,
        FontBackgroundColor,
        FontColor,
        FontFamily,
        FontSize,
        GeneralHtmlSupport,
        Heading,
        Highlight,
        HorizontalLine,
        ImageCaption,
        ImageEditing,
        ImageInsert,
        ImageInsertViaUrl,
        ImageStyle,
        ImageTextAlternative,
        ImageToolbar,
        ImageUpload,
        ImageUtils,
        ImageInline,
        Indent,
        IndentBlock,
        Italic,
        Link,
        LinkImage,
        List,
        MediaEmbed,
        Mention,
        PictureEditing,
        Strikethrough,
        Subscript,
        Superscript,
        Table,
        TableCaption,
        TableToolbar,
        TextTransformation,
        TodoList,
        Underline,
        BalloonToolbar,
        Emoji
    } = window.CKEDITOR;
    const {
        ExportPdf,
        ExportWord
    } = window.CKEDITOR_PREMIUM_FEATURES;

    const editorConfig = {
        toolbar: {
            items: [
                'undo', 'redo', '|',
                'heading', '|',
                'fontSize', 'fontFamily', 'fontColor', 'fontBackgroundColor', '|',
                'bold', 'italic', 'underline', 'strikethrough',
                'subscript', 'superscript', 'code', '|',
                'emoji', 'horizontalLine', 'link',
                'insertImage', 'insertImageViaUrl', 'mediaEmbed', 'insertTable',
                'highlight', 'blockQuote', 'codeBlock', '|',
                'alignment', '|',
                'bulletedList', 'numberedList', 'todoList', 'outdent', 'indent', '|',
                'exportWord', 'exportPdf'
            ],
            shouldNotGroupWhenFull: false
        },
        plugins: [
            Alignment,
            Autoformat,
            AutoImage,
            AutoLink,
            Autosave,
            BalloonToolbar,
            BlockQuote,
            Bold,
            Code,
            CodeBlock,
            Emoji,
            Essentials,
            ExportPdf,
            ExportWord,
            FontBackgroundColor,
            FontColor,
            FontFamily,
            FontSize,
            GeneralHtmlSupport,
            Heading,
            Highlight,
            HorizontalLine,
            ImageBlock,
            ImageCaption,
            ImageEditing,
            ImageInline,
            ImageInsert,
            ImageInsertViaUrl,
            ImageStyle,
            ImageTextAlternative,
            ImageToolbar,
            ImageUpload,
            ImageUtils,
            Indent,
            IndentBlock,
            Italic,
            Link,
            LinkImage,
            List,
            MediaEmbed,
            Mention,
            Paragraph,
            PictureEditing,
            Strikethrough,
            Subscript,
            Superscript,
            Table,
            TableCaption,
            TableToolbar,
            TextTransformation,
            TodoList,
            Underline
        ],
        balloonToolbar: [
            'bold', 'italic', '|', 'link', 'insertImage', '|',
            'bulletedList', 'numberedList'
        ],
        exportPdf: {
            stylesheets: [
                'https://cdn.ckeditor.com/ckeditor5/48.2.0/ckeditor5.css',
                'https://cdn.ckeditor.com/ckeditor5-premium-features/48.2.0/ckeditor5-premium-features.css'
            ],
            fileName: 'product-description.pdf'
        },
        exportWord: {
            stylesheets: [
                'https://cdn.ckeditor.com/ckeditor5/48.2.0/ckeditor5.css',
                'https://cdn.ckeditor.com/ckeditor5-premium-features/48.2.0/ckeditor5-premium-features.css'
            ],
            fileName: 'product-description.docx'
        },
        fontFamily: {
            supportAllValues: true
        },
        fontSize: {
            options: [10, 12, 14, 'default', 18, 20, 22],
            supportAllValues: true
        },
        heading: {
            options: [
                { model: 'paragraph', title: 'Paragraph', class: 'ck-heading_paragraph' },
                { model: 'heading1', view: 'h1', title: 'Heading 1', class: 'ck-heading_heading1' },
                { model: 'heading2', view: 'h2', title: 'Heading 2', class: 'ck-heading_heading2' },
                { model: 'heading3', view: 'h3', title: 'Heading 3', class: 'ck-heading_heading3' },
                { model: 'heading4', view: 'h4', title: 'Heading 4', class: 'ck-heading_heading4' },
                { model: 'heading5', view: 'h5', title: 'Heading 5', class: 'ck-heading_heading5' },
                { model: 'heading6', view: 'h6', title: 'Heading 6', class: 'ck-heading_heading6' }
            ]
        },
        htmlSupport: {
            allow: [
                {
                    name: /^.*$/,
                    styles: true,
                    attributes: true,
                    classes: true
                }
            ]
        },
        image: {
            toolbar: [
                'toggleImageCaption', 'imageTextAlternative', '|',
                'imageStyle:inline', 'imageStyle:wrapText', 'imageStyle:breakText'
            ]
        },
        link: {
            addTargetToExternalLinks: true,
            defaultProtocol: 'https://',
            decorators: {
                toggleDownloadable: {
                    mode: 'manual',
                    label: 'Downloadable',
                    attributes: {
                        download: 'file'
                    }
                }
            }
        },
        mention: {
            feeds: [
                {
                    marker: '@',
                    feed: []
                }
            ]
        },
        menuBar: {
            isVisible: true
        },
        placeholder: 'Masukkan Description Product',
        table: {
            contentToolbar: ['tableColumn', 'tableRow', 'mergeTableCells']
        },
        licenseKey: document.body.dataset.ckeditorLicenseKey
    };

    ClassicEditor.create(editorElement, editorConfig)
        .then(editor => {
            const form = document.querySelector('form');

            form.addEventListener('submit', () => {
                document.querySelector('#description').value = editor.getData();
            });
        })
        .catch(error => {
            console.error(error);
        });
})();
