<?php
/*
Plugin Name: bURL
Plugin URI: http://github.com/deluks/burl
Description: Includes original domainname and file extension in the shortened link
Version: 1.0
Author: Lukas Lindinger
Author URI: http://your-site-if-any/
*/

// No direct call
if( !defined( 'YOURLS_ABSPATH' ) ) die();

function deluks_burl_keyword ( $keyword, $url, $title ) {
    $domainname = parse_url($url, PHP_URL_HOST);
    $file_extension = pathinfo(parse_url($url, PHP_URL_PATH), PATHINFO_EXTENSION);
    if (!$file_extension) { $file_extension .= "."; }

    return $domainname . "/" . $keyword . $file_extension;
}

yourls_add_filter( 'random_keyword', 'deluks_burl_keyword' );
