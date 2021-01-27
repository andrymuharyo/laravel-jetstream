/**
 * @license Copyright (c) 2003-2019, CKSource - Frederico Knabben. All rights reserved.
 * For licensing, see https://ckeditor.com/legal/ckeditor-oss-license
 */

CKEDITOR.editorConfig = function (config) {
    config.height = "500";
    config.allowedContent = true;
    config.jsplus_image_editor_init_tool = "text";
    config.uiColor = "#ffffff";

    // Toolbar configuration generated automatically by the editor based on config.toolbarGroups.
    config.toolbarGroups = [
        { name: "clipboard", groups: ["mode", "clipboard", "undo"] },
        {
            name: "editing",
            groups: ["find", "selection", "spellchecker", "editing"],
        },
        { name: "styles", groups: ["styles"] },
        { name: "basicstyles", groups: ["basicstyles", "cleanup"] },
        {
            name: "paragraph",
            groups: ["list", "indent", "outdent", "blocks", "align"],
        },
        { name: "links", groups: ["links"] },
        { name: "insert", groups: ["uploadimage","youtube"] },
    ];
    // Remove Plugins
    config.removeButtons =
        "Document,Colors,Save,NewPage,Preview,Print,Templates,Cut,Undo,Redo,Replace,Find,SelectAll,Print,Copy,Paste,PasteText,Styles,Font,FontSize,PasteFromWord,Scayt,Form,Checkbox,Radio,TextField,Textarea,Strike,Subscript,Superscript,Break,Select,Button,ImageButton,HiddenField,JustifyBlock,CopyFormatting,CreateDiv,Table,HorizontalRule,Language,Anchor,Flash,Smiley,SpecialChar,PageBreak,Iframe,ShowBlocks,Others,About";

    config.removePlugins = "Tools,PasteFromWord,PasteText";
    // Ckfinder
    filebrowserBrowseUrl: "/ckfinder/ckfinder.html";
    filebrowserUploadUrl: "/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files";

    // Set the most common block elements.
    config.format_tags = "p;h1;h2;h3;h4;h5;h6;pre";

    // Youtube
    config.extraPlugins = "youtube,image2,fakeobjects,html5video,maximize";

    // Image Class
    config.image2_alignClasses = ["left-image", "center-image", "right-image"];
};
