/**
 * @license Copyright (c) 2003-2019, CKSource - Frederico Knabben. All rights reserved.
 * For licensing, see https://ckeditor.com/legal/ckeditor-oss-license
 */

CKEDITOR.editorConfig = function (config) {
	config.allowedContent = true;
	// Define changes to default configuration here.
	// For complete reference see:
	// https://ckeditor.com/docs/ckeditor4/latest/api/CKEDITOR_config.html

	// The toolbar groups arrangement, optimized for a single toolbar row.
	config.allowedContent = true;
	config.jsplus_image_editor_init_tool = "text";
	config.uiColor = "#ffffff";
	config.toolbarGroups = [
		{ name: "clipboard", groups: ["clipboard", "undo"] },
		{ name: "basicstyles", groups: ["basicstyles"] },
		{ name: "paragraph", groups: ["list", "indent", "align"] },
		{ name: "links" },
	];

	// The default plugins included in the basic setup define some buttons that
	// are not needed in a basic editor. They are removed here.
	config.removeButtons =
		"Save,Templates,Cut,Undo,Find,SelectAll,Scayt,Form,CopyFormatting,Outdent,Blockquote,JustifyLeft,Preview,NewPage,Print,Copy,Paste,PasteText,PasteFromWord,Redo,Replace,Checkbox,Radio,TextField,Textarea,Select,Button,ImageButton,HiddenField,Strike,Subscript,Superscript,RemoveFormat,Indent,JustifyCenter,CreateDiv,JustifyRight,JustifyBlock,BidiLtr,Image,Flash,BidiRtl,Language,Table,HorizontalRule,Anchor,Smiley,SpecialChar,PageBreak,Iframe,Styles,TextColor,Maximize,About,BGColor,ShowBlocks,Format,Font,FontSize";

	// Dialog windows are also simplified.
	config.removeDialogTabs = "";
};
