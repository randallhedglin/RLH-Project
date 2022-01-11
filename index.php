<?php

// show all errors
ini_set('display_errors', 1); ini_set('display_startup_errors', 1); error_reporting(E_ALL);

// load required classes & helper functions
require 'rlh-project/.class/HTMLElements.php';
require 'rlh-project/.class/HTMLHelpers.php';
require 'rlh-project/.class/LinkCard.php';
require 'rlh-project/.class/LinkStack.php';
require 'rlh-project/.class/LinkContainer.php';

// define sizing values
function MAX_CONTENT_WIDTH() { return '1280px'; };
function LITE_MENU_WIDTH()   { return '1000px'; };
function HIDE_MENU_WIDTH()   { return '800px'; };
function LINK_CARD_WIDTH()   { return '300px'; };
function LINK_CARD_HEIGHT()  { return '48px'; };
function LINK_STACK_BORDER() { return '16px'; };

// output homepage
_html(null,
    _head(null,
        _title(null, 'Welcome to LocalHost (127.0.0.1)'),
        _link_stylesheet('href=https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css'),
        _script('src=https://kit.fontawesome.com/8fd2c789c7.js crossorigin=anonymous'),
        _script('src=https://code.jquery.com/jquery-3.6.0.min.js'),
        _script('src=https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js'),
        _style(null, get_primary_css()),
        _style(null, get_header_css()),
        _style(null, get_body_css()),
        _style(null, get_footer_css()),
        _style(null, RLHProject\LinkCard::get_css(LINK_CARD_WIDTH(), LINK_CARD_HEIGHT(), LINK_STACK_BORDER())),
        _style(null, RLHProject\LinkStack::get_css(LINK_CARD_WIDTH(), LINK_CARD_HEIGHT(), LINK_STACK_BORDER())),
        _style(null, RLHProject\LinkContainer::get_css()),
    ),
    _body(null,
        _div('class=rlh-primary-container',
            _div('class=rlh-header-container',
                _div('class=rlh-header-left',  null),
                _div('class=rlh-header-main',  get_header_content()),
                _div('class=rlh-header-right', null),
            ),
            _div('class=rlh-body-container',
                _div('class=rlh-body-left',    null),
                _div('class=rlh-body-main',    get_body_content()),
                _div('class=rlh-body-right',   null),
            ),
            _div('class=rlh-footer-container',
                _div('class=rlh-footer-left',  null),
                _div('class=rlh-footer-main',  get_footer_content()),
                _div('class=rlh-footer-right', null),
            ),
        ),
    ),
)->output_html();

// get primary css
function get_primary_css() { return '

body {
    margin: 0;
}

.rlh-primary-container {
    display:    flex;
    flex-flow:  column nowrap;
    min-height: 100vh;
}

'; }

// get header css
function get_header_css() { return '

.rlh-header-container {
    display:   flex;
    flex-flow: row nowrap;
    flex:      0 1;
}

.rlh-header-left,
.rlh-header-right {
    background: #b7adcf;
    flex:       1;
}

.rlh-header-main {
    background: #4f646f;
    flex:       0 0 ' . MAX_CONTENT_WIDTH() . ';
}

@media screen and (max-width: ' . MAX_CONTENT_WIDTH() . ') {
    .rlh-header-left,
    .rlh-header-right {
        display: none;
    }

    .rlh-header-main {
        flex: 1;
    }
}

'; }

// get header content
function get_header_content() {

    // return the content
    return _div('style=color:white; font-size:150%; font-weight:bold; text-align:center; padding:1em',
        _i('class=fas fa-globe style=padding-right:.5em; font-size:110%'),
        'Welcome to LocalHost (127.0.0.1)');
}

// get body css
function get_body_css() { return '

.rlh-body-container {
    display:   flex;
    flex-flow: row nowrap;
    flex:      1;
}

.rlh-body-left,
.rlh-body-right {
    background: #f4faff;
    flex:       1;
}

.rlh-body-main {
    background: #dee7e7;
    flex:       0 0 ' . MAX_CONTENT_WIDTH() . ';
}

@media screen and (max-width: ' . MAX_CONTENT_WIDTH() . ') {
    .rlh-body-left,
    .rlh-body-right {
        display: none;
    }

    .rlh-body-main {
        flex: 1;
    }
}

'; }

// get body content
function get_body_content() {

    // return the content
    return get_link_container();
}

// get footer css
function get_footer_css() { return '

.rlh-footer-container {
    display:   flex;
    flex-flow: row nowrap;
    flex:      0 1;
}

.rlh-footer-left,
.rlh-footer-right {
    background: #b7adcf;
    flex:       1;
}

.rlh-footer-main {
    background: #535657;
    flex:       0 0 ' . MAX_CONTENT_WIDTH() . ';
}

@media screen and (max-width: ' . MAX_CONTENT_WIDTH() . ') {
    .rlh-footer-left,
    .rlh-footer-right {
        display: none;
    }

    .rlh-footer-main {
        flex: 1;
    }
}

'; }

// output footer content
function get_footer_content() {

    // return the content
    return _div('style=color:white; text-align:center; padding: 1em', '&copy; 2021 RLH Custom');
}

// get link container
function get_link_container() {

    // create & return the object
    return new RLHProject\LinkContainer(
        new RLHPRoject\LinkStack('fab fa-windows', 'Windows', 'RLHProject\\LinkCard::ascending_sort_by_display_text',
            new RLHProject\LinkCard('fas fa-house-damage', 'Index (old)',    '/old_files_windows/show_index_old.php'),
            new RLHProject\LinkCard('fas fa-database',     'MySQL Info',     '/old_files_windows/show_mysql_info.php'),
            new RLHProject\LinkCard('fab fa-php',          'PHP Info',       '/old_files_windows/show_php_info.php'),
            new RLHProject\LinkCard('fas fa-screwdriver',  'phpMyAdmin',     '/phpmyadmin'),
            new RLHProject\LinkCard('fas fa-info-circle',  'phpSysInfo',     '/phpsysinfo'),
            new RLHProject\LinkCard('fas fa-folder-open',  'RLH-Project',    '/rlh-project'),
            new RLHProject\LinkCard('fab fa-wordpress',    'Wordpress',      '/wordpress_windows'),
            new RLHProject\LinkCard('fas fa-laptop',       'YourIMEExperts', '/yourimeexperts_windows'),
        ),
        new RLHPRoject\LinkStack('fab fa-apple', 'Mac OS', 'RLHProject\\LinkCard::ascending_sort_by_display_text',
            new RLHProject\LinkCard('fas fa-file-alt',     'HTDocs',      '/old_files_mac/htdocs'),
            new RLHProject\LinkCard('fas fa-house-damage', 'Index (old)', '/old_files_mac/show_index_old.php'),
            new RLHProject\LinkCard('fas fa-database',     'MySQL Info',  '/old_files_mac/show_mysql_info.php'),
            new RLHProject\LinkCard('fab fa-php',          'PHP Info',    '/old_files_mac/show_php_info.php'),
            new RLHProject\LinkCard('fas fa-screwdriver',  'phpMyAdmin',  '/phpmyadmin'),
            new RLHProject\LinkCard('fas fa-info-circle',  'phpSysInfo',  '/phpsysinfo'),
            new RLHProject\LinkCard('fas fa-folder-open',  'RLH-Project', '/rlh-project'),
            new RLHProject\LinkCard('fab fa-wordpress',    'Wordpress',   '/wordpress_mac'),
        ),
        new RLHPRoject\LinkStack('fab fa-ubuntu', 'Ubuntu', 'RLHProject\\LinkCard::ascending_sort_by_display_text',
            new RLHProject\LinkCard('fas fa-file-alt',     'HTDocs',      '/old_files_ubuntu/htdocs'),
            new RLHProject\LinkCard('fas fa-house-damage', 'Index (old)', '/old_files_ubuntu/show_index_old.php'),
            new RLHProject\LinkCard('fas fa-database',     'MySQL Info',  '/old_files_ubuntu/show_mysql_info.php'),
            new RLHProject\LinkCard('fab fa-php',          'PHP Info',    '/old_files_ubuntu/show_php_info.php'),
            new RLHProject\LinkCard('fas fa-screwdriver',  'phpMyAdmin',  '/phpmyadmin'),
            new RLHProject\LinkCard('fas fa-info-circle',  'phpSysInfo',  '/phpsysinfo'),
            new RLHProject\LinkCard('fas fa-folder-open',  'RLH-Project', '/rlh-project'),
            new RLHProject\LinkCard('fab fa-wordpress',    'Wordpress',   '/wordpress_ubuntu'),
        ),
    );
}

?>