<?php
/**
 * The sidebar containing the main widget area.
 *
 * @package din-theme
 */

?>
<section class="section section-sidebar container" id="blog-aside">
    <div class="row">
        <div class="col-lg-12 text-center">

            <h1 class="text-center"><a href="<?php echo esc_url( home_url( '/' ) ); ?>"><? bloginfo('title'); ?></a></h1>
            <!-- Categories -->
            <? /*
            <h3><? echo _e( 'Categories' ) ?></h3>
            <ul class="nav-categories">
                <?php
                wp_reset_query();
                $args = array(
                    'orderby' => 'name',
                    'order' => 'ASC'
                );

                $categories = get_categories($args);
                foreach($categories as $category) {
                    echo '<li><a href="' . get_category_link( $category->term_id ) . '" title="' . sprintf( __( "View all posts in %s" ), $category->name ) . '" ' . '>' . $category->name.'</a></li>';  }
                ?>
            </ul>
            */ ?>
        </div>
    </div>
</section>