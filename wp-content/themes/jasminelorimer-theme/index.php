<?php
/**
 * The main template file
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists
 *
 * Methods for TimberHelper can be found in the /lib sub-directory
 *
 * @package  WordPress
 * @subpackage  Timber
 * @since   Timber 0.1
 */
$context = Timber::get_context();
$context['posts'] = new Timber\PostQuery();

$templates = array( 'index.twig' );

if ( is_home() ) {
    $context['teasers'] = [
        [
            'image' => 'teaser-1.png',
            'title' => 'When nothing is certain, anything is possible',
            'copy' => 'Quick video on how I get a loose, casual wave with a curling iron. The technique takes some getting used to, but it\'s so easy once you get the hang of it.',
            'category' => 'Relationships',
        ],
        [
            'image' => 'teaser-2.png',
            'title' => 'Loose, casual waves',
            'copy' => 'Quick video on how I get a loose, casual wave with a curling iron. The technique takes some getting used to, but it\'s so easy once you get the hang of it. ',
            'category' => 'Beauty',
        ],
        [
            'image' => 'teaser-3.png',
            'title' => 'Ask me anything',
            'copy' => 'Quick video on how I get a loose, casual wave with a curling iron. The technique takes some getting used to, but it\'s so easy once you get the hang of it. ',
            'category' => 'Q&A',
        ],
    ];

	array_unshift( $templates, 'home.twig' );
}
Timber::render( $templates, $context );
