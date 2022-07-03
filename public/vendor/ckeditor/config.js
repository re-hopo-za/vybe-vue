/**
 * @license Copyright (c) 2003-2019, CKSource - Frederico Knabben. All rights reserved.
 * For licensing, see https://ckeditor.com/legal/ckeditor-oss-license
 */

CKEDITOR.editorConfig = function( config ) {
	// Define changes to default configuration here. For example:
	// config.language = 'fr';
	// config.uiColor = '#AADC6E';
	
	config.language = 'en';
	config.autoParagraph = false;
	config.enterMode = CKEDITOR.ENTER_BR;
	config.extraPlugins = 'html5video,html5audio,widget,widgetselection,clipboard,lineutils';
	config.templates_files= ['/plugins/ckeditor/plugins/templates/templates/default.js'];
};
