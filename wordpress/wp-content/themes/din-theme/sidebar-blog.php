<?php
/**
 * The sidebar containing the main widget area.
 *
 * @package din-theme
 */

?>

<!-- Search Form -->
<? /*
<div class="search-form">
    <!-- Sido -->
    <? get_search_form();

    ?>


</div>
 */ ?>

<!-- Popular Posts -->
<? /*
<div id="popular-posts">
    <h3><? echo _e('Popular Posts', 'din-theme'); ?></h3>
    <ul>
        <?
        wp_reset_query();
        wp_reset_postdata();
        $the_query = new WP_Query( array( 'posts_per_page' => 4, 'orderby' => 'meta_value_num', 'order' => 'DESC'  ) );
        if ( $the_query->have_posts() ) : ?>

            <!-- pagination here -->

            <!-- the loop -->
            <?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
                <li><a href="<? echo get_permalink(get_the_ID());?>"><?php echo the_title(); ?></a></li>
            <?php endwhile; ?>
            <!-- end of the loop -->

            <!-- pagination here -->

            <?php wp_reset_postdata(); ?>

        <?php else : ?>
            <p><?php _e( 'Sorry, no posts matched your criteria.' ); ?></p>
        <?php endif; ?>
        <!--
                    <? print_r ($popularpost); ?>
                    //-->
    </ul>
</div>
*/ ?>
<!-- Categories -->
<h3><? echo _e( 'Categories' ) ?></h3>
<ul>
    <?php
    wp_reset_query();
    $args = array(
        'orderby' => 'name',
        'order' => 'ASC'
    );

    $categories = get_categories($args);
    foreach($categories as $category) {
        echo '<li><a href="' . get_category_link( $category->term_id ) . '" title="' . sprintf( __( "View all posts in %s" ), $category->name ) . '" ' . '>' . $category->name.'</a>';
        echo ' <span class="badge badge-info">'. $category->count . '</span></li>';  }
    ?>
    <!--
                    <? print_r ($categories); ?>

                    //-->
</ul>
<?
/*

<h3><? echo _e('Recent Posts'); ?></h3>
<ul>
    <?php
    wp_reset_query();
    $args = array( 'numberposts' => '2' );
    $recent_posts = wp_get_recent_posts( $args );
    foreach( $recent_posts as $recent ){
        echo '<li><a href="' . get_permalink($recent["ID"]) . '">' .   $recent["post_title"].'</a> </li> ';
    }
    ?>
    <!--
                    <? print_r ($recent_posts); ?>
                    //-->
</ul>
      */?>