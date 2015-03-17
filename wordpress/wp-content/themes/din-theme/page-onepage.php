<?php
/**
 * Template Name: One Page Love
 *
 * Description: A Page Template with content & blog entries. Designed for visual composer & infinite scroll.
 *
 * @package WordPress
 * @subpackage Twenty_Eleven
 * @since Twenty Eleven 1.0
 * @author wearepictures
 */

// Enqueue showcase script for the slider

get_header(); ?>
<section id="intro" class="onepage-intro">
    <div class="container">
        <div class="row">
            <?php while ( have_posts() ) : the_post(); ?>
            <?php
                /*
                 * We are using a heading by rendering the_content
                 * If we have content for this page, let's display it.
                 */
                if ( '' != get_the_content() )
                    get_template_part( 'content', 'intro' );
            ?>
            <?php endwhile; ?>
        </div>
    </div>
</section>

<section class="onepage-posts">
    <div class="container">
        <div class="row">
            <h1 class="onepage-heading"><?php _e( 'Recent Posts', 'din_theme' ); ?></h1>
            <!-- Content for Infinity Scroll -->
            <div id="content">
            <?php

            // Display our recent posts, showing full content for the very latest, ignoring Aside posts.
            $recent_args = array(
                'order' => 'DESC',
                'post__not_in' => get_option( 'sticky_posts' ),
                'tax_query' => array(
                    array(
                        'taxonomy' => 'post_format',
                        'terms' => array( 'post-format-aside', 'post-format-link', 'post-format-quote', 'post-format-status' ),
                        'field' => 'slug',
                        'operator' => 'NOT IN',
                    ),
                ),
                'no_found_rows' => true,
            );

            // Our new query for the Recent Posts section.
            $recent = new WP_Query( $recent_args );

            // For all other recent posts, just display the title and comment status.
            while ( $recent->have_posts() ) : $recent->the_post(); ?>

                <? get_template_part( 'content', 'post' ); ?>

            <?php endwhile; ?>
            </div><!-- /Content for Infinity Scroll -->
        </div>
        <?php din_theme_content_nav( 'nav-below' ); ?>
    </div>
</section><!-- .recent-posts -->

<?php get_footer(); ?>