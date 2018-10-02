<?php
/**
 * The Template for displaying all single posts
 *
 * Methods for TimberHelper can be found in the /lib sub-directory
 *
 * @package  WordPress
 * @subpackage  Timber
 * @since    Timber 0.1
 */

$context = Timber::get_context();
$post = Timber::query_post();
$context['post'] = $post;

if (get_field('video_url')) {
    $url = get_field('video_url');
    parse_str( parse_url( $url, PHP_URL_QUERY ), $my_array_of_vars );
    if ($my_array_of_vars['v']) {
        $context['video_url'] = $my_array_of_vars['v'];
    }
}

if ( post_password_required( $post->ID ) ) {
	Timber::render( 'single-password.twig', $context );
} else {
	Timber::render( array( 'single-' . $post->ID . '.twig', 'single-' . $post->post_type . '.twig', 'single.twig' ), $context );
}
