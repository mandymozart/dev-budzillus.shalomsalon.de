<?php
/**
 * The template for displaying archive pages.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package din-theme
 */

get_header(); ?>
<!-- archive -->
<? get_template_part('sidebar','single'); ?>

	<section id="primary" class="container content-area">
        <div class="row">
            <div class="col-lg-12">
                <main id="main" class="site-main" role="main">

                <?php if ( have_posts() ) : ?>

                    <header>
                        <h2>
                            <?php
                                if ( is_category() ) :
                                    single_cat_title();

                                elseif ( is_tag() ) :
                                    single_tag_title();

                                elseif ( is_author() ) :
                                    printf( __( 'Author: %s', 'din-theme' ), '<span class="vcard">' . get_the_author() . '</span>' );

                                elseif ( is_day() ) :
                                    printf( __( 'Day: %s', 'din-theme' ), '<span>' . get_the_date() . '</span>' );

                                elseif ( is_month() ) :
                                    printf( __( 'Month: %s', 'din-theme' ), '<span>' . get_the_date( _x( 'F Y', 'monthly archives date format', 'din-theme' ) ) . '</span>' );

                                elseif ( is_year() ) :
                                    printf( __( 'Year: %s', 'din-theme' ), '<span>' . get_the_date( _x( 'Y', 'yearly archives date format', 'din-theme' ) ) . '</span>' );

                                elseif ( is_tax( 'post_format', 'post-format-aside' ) ) :
                                    _e( 'Asides', 'din-theme' );

                                elseif ( is_tax( 'post_format', 'post-format-gallery' ) ) :
                                    _e( 'Galleries', 'din-theme' );

                                elseif ( is_tax( 'post_format', 'post-format-image' ) ) :
                                    _e( 'Images', 'din-theme' );

                                elseif ( is_tax( 'post_format', 'post-format-video' ) ) :
                                    _e( 'Videos', 'din-theme' );

                                elseif ( is_tax( 'post_format', 'post-format-quote' ) ) :
                                    _e( 'Quotes', 'din-theme' );

                                elseif ( is_tax( 'post_format', 'post-format-link' ) ) :
                                    _e( 'Links', 'din-theme' );

                                elseif ( is_tax( 'post_format', 'post-format-status' ) ) :
                                    _e( 'Statuses', 'din-theme' );

                                elseif ( is_tax( 'post_format', 'post-format-audio' ) ) :
                                    _e( 'Audios', 'din-theme' );

                                elseif ( is_tax( 'post_format', 'post-format-chat' ) ) :
                                    _e( 'Chats', 'din-theme' );

                                else :
                                    _e( 'Archives', 'din-theme' );

                                endif;
                            ?>
                        </h2>
                        <?php
                            // Show an optional term description.
                            $term_description = term_description();
                            if ( ! empty( $term_description ) ) :
                                printf( '<div class="taxonomy-description">%s</div>', $term_description );
                            endif;
                        ?>
                    </header><!-- .page-header -->

                    <?php /* Start the Loop */ ?>
                    <?php while ( have_posts() ) : the_post(); ?>

                        <?php
                            /* Include the Post-Format-specific template for the content.
                             * If you want to override this in a child theme, then include a file
                             * called content-___.php (where ___ is the Post Format name) and that will be used instead.
                             */
                            get_template_part( 'content', 'post' );
                        ?>

                    <?php endwhile; ?>

                    <?php din_theme_paging_nav(); ?>

                <? else : ?>

                    <? get_template_part( 'content', 'post' ); ?>

                <? endif; ?>

                </main><!-- #main -->
            </div>
        </div>
 	</section><!-- #primary -->

<?php // get_sidebar(); ?>
<?php get_footer(); ?>
