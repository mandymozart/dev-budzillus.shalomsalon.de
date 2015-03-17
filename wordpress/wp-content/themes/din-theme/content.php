<?php
/**
 * @package din-theme
 */
?>

<? if ( is_single() ) : ?>
    <a href="<?php echo site_url(); ?>#post-<?php the_ID(); ?>"><span class="fa fa-long-arrow-left"></span> <? echo _e('Zurück'); ?></a>
<? endif; ?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <header class="entry-header">
        <?
        // Check for secondary image first
        /*
        if (class_exists('MultiPostThumbnails')){
            new MultiPostThumbnails(
                array(
                    'label' => 'Secondary Image',
                    'id' => 'secondary-image',
                    'post_type' => 'post'
                )
            );
            $thumbnail = the_post_thumbnail(array(
                'post_type' => 'post',
                'id' => 'secondary-image',
                'attr' => 'portrait-thumb'));
        } elseif(has_post_thumbnail()) {
            */
        if ( is_single() ) :
            the_title( '<h1 class="entry-title">', '</h1>' );
        else :
            the_title( sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' );
        endif;
        /*
        ?>
        <div class="entry-meta"><? echo __('Posted by', 'din-theme');?> <? the_author(); ?> <? the_date(); ?></div>
        <?
        */
        if(has_post_thumbnail()) {
            the_post_thumbnail('blog-image',array( 'class'	=> "img-responsive"));
        } ?>

    </header><!-- .entry-header -->

    <div class="entry-content">
        <?php the_content(); ?>
    </div><!-- .entry-content -->
    <?
    if ( is_single() ) :
    ?>
    <div class="entry-social">
        <h3><? echo _e('Teile dich mit!','din-theme'); ?></h3>
        <a href="http://www.facebook.com/sharer/sharer.php?u=<? echo get_permalink(the_ID()); ?>" target="_blank"><span class="fa fa-2x fa-facebook-square"></span></a>
        <a href="http://twitter.com/share" target="_blank"><span class="fa fa-twitter-square fa-2x "></span></a>
    </div>
    <?
    endif;
    ?>
</article><!-- #post-## -->
