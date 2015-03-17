<?php
/**
 * The template for displaying search results pages.
 *
 * @package din-theme
 */

get_header(); ?>
<!-- search -->
	<section id="primary" class="container content-area">
        <div class="row">
            <div class="col-md-8 col-xs-12">
                <main id="main" class="site-main" role="main">

                <?php if ( have_posts() ) : ?>

                    <header>
                        <h2><?php printf( _e( 'Search Results for: %s', 'din-theme' ), '<span>' . get_search_query() . '</span>' ); ?></h2>
                    </header><!-- .page-header -->

                    <?php /* Start the Loop */ ?>
                    <?php while ( have_posts() ) : the_post(); ?>

                        <?php
                        /**
                         * Run the loop for the search to output the results.
                         * If you want to overload this in a child theme then include a file
                         * called content-search.php and that will be used instead.
                         */
                        get_template_part( 'content' );
                        ?>

                    <?php endwhile; ?>

                    <?php din_theme_paging_nav(); ?>

                <?php else : ?>

                    <?php get_template_part( 'content', 'none' ); ?>

                <?php endif; ?>

                </main><!-- #main -->
            </div>
            <div class="col-md-4 col-xs-12" id="blog-aside">
                <? get_template_part('sidebar','blog'); ?>
            </div>
        </div>
	</section><!-- #primary -->

<?php // get_sidebar(); ?>
<?php get_footer(); ?>
