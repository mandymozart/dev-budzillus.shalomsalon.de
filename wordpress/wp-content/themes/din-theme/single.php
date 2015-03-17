<?php
/**
 * The template for displaying all single posts.
 *
 * @package din-theme
 */

get_header(); ?>
<? get_template_part('sidebar','single'); ?>
    <!-- single -->
	<section id="primary" class="section section-single container">
        <div class="row">
            <div class="col-lg-12">
                <main id="main" class="site-main" role="main">

                    <?php while ( have_posts() ) : the_post(); ?>

                        <?php get_template_part( 'content', 'single' ); ?>
                        <div class="clearfix"></div>
                        <? /*
                        <hr />
                        <?php din_theme_post_nav(); ?>
                        <div class="clearfix"></div>
                        <hr />
                        */?>

                    <?php endwhile; // end of the loop. ?>
                </main><!-- #main -->
            </div>
        </div>

	</section><!-- #primary -->
<?php get_footer(); ?>