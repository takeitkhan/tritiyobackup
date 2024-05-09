/**
 * @license Copyright (c) 2003-2015, CKSource - Frederico Knabben. All rights reserved.
 * For licensing, see LICENSE.md or http://ckeditor.com/license
 */

CKEDITOR.editorConfig = function (config) {
    config.allowedContent = 'p{text-align}(*); strong(*); em(*); b(*); i(*); u(*); sup(*); sub(*); ul(*); ol(*); li(*); a[!href](*); br(*); hr(*); img{*}[*](*); iframe(*)';
    config.disallowedContent = '*[on*]';
    // Define changes to default configuration here. For example:
    // config.language = 'fr';
    // config.uiColor = '#AADC6E';
};
