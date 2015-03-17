<?php
/**
 * The sidebar containing the main widget area.
 *
 * @package din-theme
 */

?>
<div class="row" id="blog-aside">
    <!-- Search Form -->
    <div class="col-md-4 col-xs-12 search-form">
        <!-- Sido -->
        <? get_search_form(); ?>

    </div>

    <!-- Popular Posts -->
    <div class="col-md-8 col-xs-12" id="popular-posts">
        <h3><? echo __('Popular Posts', 'din-theme'); ?></h3>
        <ul>
            <?
            wp_reset_query();
            wp_reset_postdata();
            $the_query = new WP_Query( array( 'posts_per_page' => 2, 'orderby' => 'meta_value_num', 'order' => 'DESC'  ) );
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

        <div id="recent-posts">
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
        </div>
    </div>
</div>