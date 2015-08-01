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

global $deluks_burl_domainname;
global $deluks_burl_fileextension;

function deluks_burl( $url, $keyword, $title ) {
    $deluks_burl_domainname = parse_url($url, PHP_URL_HOST);
    $deluks_burl_fileextension = pathinfo(parse_url($url, PHP_URL_PATH), PATHINFO_EXTENSION); // should be ".ext" or empty!
}

function deluks_burl_keyword ( $keyword, $url, $title ) {
    return $deluks_burl_domainname . "/" . $keyword . $deluks_burl_fileextension;
}

yourls_do_action( 'pre_add_link', 'deluks_burl' );
yourls_add_filter( 'random_keyword', 'deluks_burl_keyword' );
