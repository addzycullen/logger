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
 * @subpackage  Logger
 * @since   Logger 1.0
 *
 */

    namespace Logger;
    use Timber\Timber;
    use Timber\PostQuery;


    $context          = Timber::context();
    $context['posts'] = new PostQuery();
    $context['foo']   = 'bar';

    $templates        = array( 'index.twig' );
    if ( is_home() ) {
        array_unshift( $templates, 'front-page.twig', 'home.twig' );
    }

    // Start our Output Buffer
    logger()->before_template_render();
    // logger()->loggerCompressionBufferStart();

    Timber::render( $templates, $context, false );

    // Get contents of our Output Buffer and return it instead of default render.
    logger()->after_template_render();
    // logger()->loggerCompressionBufferFinish();
