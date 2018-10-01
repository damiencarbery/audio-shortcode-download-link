<?php
/*
Plugin Name: Audio Shortcode - Append Download button
Plugin URI: http://www.damiencarbery.com
GitHub Plugin URI: https://github.com/damiencarbery/audio-shortcode-download-link
Description: Add a Download link to the html generated for the "audio" shortcode.
Author: Damien Carbery
Version: 0.4
*/


if ( ! defined( 'WPINC' ) ) {
	die;
}


add_filter( 'wp_audio_shortcode', 'ast_audio_shortcode_enhancer', 10, 5 );
function ast_audio_shortcode_enhancer( $html, $atts, $audio, $post_id, $library ) {
    $audio_types = array( 'mp3', 'ogg', 'wma', 'm4a', 'wav' );

    // Use the first audio type that has data.
    foreach ( $audio_types as $extension ) {
        if ( strlen( $atts[ $extension ] ) ) {
            return $html . sprintf( '<p><button type="button"><a href="%s" download>Download</a></button></p>', $atts[ $extension ] );
            break;
        }
    }

    // Otherwise return the original html.
    return $html;
}
