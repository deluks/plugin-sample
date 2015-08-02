<?php
/*
Plugin Name: bURL
Plugin URI: http://github.com/deluks/burl
Description: Includes original domainname and file extension in the shortened link
Version: 1.0
Author: Lukas Lindinger
Author URI: http://deluks.de/
*/

// No direct call
if( !defined( 'YOURLS_ABSPATH' ) ) die();

function deluks_burl_keyword ( $keyword, $url, $title ) {
    /* get domain of the original url */
    $domainname = parse_url($url, PHP_URL_HOST);

    /* get file extension of original url */
    $file_extension = pathinfo(parse_url($url, PHP_URL_PATH), PATHINFO_EXTENSION);

    /* if there was a file extension, put a "." in front of it */
    if (!empty($file_extension)) { $file_extension = "." . $file_extension; }

    return $domainname . "/" . $keyword . $file_extension;
}

yourls_add_filter( 'random_keyword', 'deluks_burl_keyword' );
