<?php
/**
 * Template Name: Mailchimp return page
 *
 * Description: A Page Template for incoming returnees
 *
 * @package WordPress
 * @subpackage Twenty_Eleven
 * @since Twenty Eleven 1.0
 * @author wearepictures
 */

// Enqueue showcase script for the slider

get_header('minimal'); ?>
<section class="section">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 text-center">
                <?php if ( have_posts() ) : ?>

                    <?php /* Start the Loop */ ?>
                    <?php while ( have_posts() ) : the_post(); ?>

                        <?php
                        /* Include the Post-Format-specific template for the content.
                         * If you want to override this in a child theme, then include a file
                         * called content-___.php (where ___ is the Post Format name) and that will be used instead.
                         */
                        get_template_part( 'content','page');
                        ?>

                    <?php endwhile; ?>

                    <?php din_theme_paging_nav(); ?>

                <?php else : ?>

                    <?php get_template_part( 'content', 'none' ); ?>

                <?php endif; ?>
        </div>
    </div>
</section><!-- .recent-posts -->

<?php get_footer('minimal'); ?>