<?php
/*
Template Name: Blog
*/


get_header(); ?>
<!-- page-blog -->
<? get_template_part('sidebar','single'); ?>

    <section class="container">
        <div class="row">
            <div id="primary" class="col-md-8 col-md-offset-2 col-xs-12 content-area">
                <main id="main" class="site-main" role="main">
                    <?php
                    wp_reset_query();
                    wp_reset_postdata();
                    $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
                    $args = array( 'post_type' => 'post', 'posts_per_page' => 10, 'paged' => $paged );
                    $wp_query = new WP_Query($args);
                    while ( have_posts() ) : the_post(); ?>
                        <?php get_template_part( 'content', 'post' ); ?>
                        <div class="clearfloat"></div>
                    <?php endwhile; ?>

                    <!-- then the pagination links -->
                    <?php next_posts_link( __('&larr; Older posts'), $wp_query ->max_num_pages); ?>
                    <?php previous_posts_link( __('Newer posts &rarr;') ); ?>

                </main><!-- #main -->
            </div><!-- #primary -->
        </div>

    </section>

<?php get_footer(); ?>