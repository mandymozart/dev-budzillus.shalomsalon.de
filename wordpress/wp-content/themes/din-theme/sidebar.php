<?php
/**
 * The sidebar containing the main widget area.
 *
 * @package din-theme
 */

if ( ! is_active_sidebar( 'sidebar-1' ) ) {
	return;
}
?>

<div id="secondary" class="widget-area" role="complementary">
    <h3><? echo __('Related Posts'); ?></h3>
    <ul>
        <?php query_posts('category_name='.$post->post_name.'&post_status=publish,future');?>

        <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
            <li><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>
        <?php endwhile; else: endif; ?>
    </ul>


    <?

    // do_shortcode('[catlist name="'.$custom_fields['list_category_posts'][0].'" numberposts=5]');
    // do_shortcode('[catlist id=1"]');



    ?>


</div><!-- #secondary -->
