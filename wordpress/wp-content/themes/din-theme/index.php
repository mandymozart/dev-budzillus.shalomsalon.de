<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package din-theme
 */

get_header(); ?>
<!-- index -->
<!-- intro onepager with sections -->
<section id="introSection" class="section section-onepage">
    <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/sprite-bombaman.png" class="img-responsive" id="bombaman"/>
    <!-- background image in outer section -->
    <div class="container-fluid">
        <div class="row">
            <!-- content located inside this container -->
            <div class="col-xs-12 text-center" id="">
                    <h1 class="text-center">BudZillus</h1>
                    <h2 class="text-center">Besser wIrds nicht.</h2>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-8 col-xs-offset-2 text-center">
                <!-- content located inside this container -->
                <? dynamic_sidebar('latest-section'); ?>
            </div>

        </div>
    </div>
</section>

<!-- Latest News/Video/etc -->
<section id="latestSection" class="section section-onepage">
    <!-- background image in outer section -->
    <div class="container-fluid">
        <div class="row">
            <div class="col-xs-12">
                <!-- 1. The <iframe> (and video player) will replace this <div> tag. -->
                <div  class="flex-video widescreen"><div id="player"></div></div>

                <script>
                    <? # get id
                    ob_start();
                    dynamic_sidebar('video-player');
                    $videoId = trim(str_replace('</div>','', str_replace('<div class="textwidget">', '', ob_get_contents())));
                    ob_end_clean();
                    ?>

                    // 2. This code loads the IFrame Player API code asynchronously.
                    var tag = document.createElement('script');

                    tag.src = "https://www.youtube.com/iframe_api";
                    var firstScriptTag = document.getElementsByTagName('script')[0];
                    firstScriptTag.parentNode.insertBefore(tag, firstScriptTag);

                    // 3. This function creates an <iframe> (and YouTube player)
                    //    after the API code downloads. h_511KOb4r4
                    var player;
                    function onYouTubeIframeAPIReady() {
                        player = new YT.Player('player', {
                            height: '315',
                            width: '560',
                            videoId: '<?=$videoId?>',
                            events: {
                                'onReady': onPlayerReady,
                                'onStateChange': onPlayerStateChange
                            },
                            playerVars: {
                                'modestbranding': 1,
                                'autoplay': 0,
                                'autohide': 1,
                                'showinfo': 0,
                                'version': 3,
                                'h1': 'en-US',
                                'controls': 1,
                                'rel' : 0
                            }
                        });
                    }

                    // 4. The API will call this function when the video player is ready.
                    function onPlayerReady(event) {
                        //event.target.playVideo();
                    }

                    // 5. The API calls this function when the player's state changes.
                    //    The function indicates that when playing a video (state=1),
                    //    the player should play for six seconds and then stop.
                    var done = false;
                    function onPlayerStateChange(event) {
                        if (event.data == YT.PlayerState.PLAYING && !done) {
                            setTimeout(stopVideo, 6000);
                            done = true;
                        }
                    }
                    function stopVideo() {
                        player.stopVideo();
                    }
                </script>

            </div>
        </div>
    </div>
</section>

<!-- Tour -->
<section id="tourSection" class="section section-onepage text-center">


    <div class="sprite top-left" id="monkeySprite"><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/sprite-monkey.png" /></div>
    <div class="sprite bottom-right" id="moonSprite"><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/sprite-moon.png" /></div>
    <!-- background image in outer section -->
    <div class="container">
        <div class="row">
            <div class="col-xs-12">
                <h2>Besser wird's nicht! Tour</h2>
                <!-- content located inside this container -->
                <p id="songkickGigs"></p>
                <!-- <a href="http://www.songkick.com/artists/2519366" class="songkick-widget" data-theme="dark" data-background-color="transparent">Konzerte</a>
                <script src="//widget.songkick.com/widget.js"></script> -->
            </div>
        </div>
    </div>
</section>

<!-- Shop -->
<section id="shopSection" class="section section-onepage">
    <div class="sprite top-left" id="transition"><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/transition.png" class="img-responsive"/></div>
    <!-- background image in outer section -->
    <div class="container-fluid">
        <div class="row" id="shopContent">
            <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1 col-sm-12 col-xs-12">
                <!-- content located inside this container -->
                <h2 class="text-center">Jetzt auf Vinyl/CD/Digital!</h2>
                <div class="sprite top-right" id="bagSprite"><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/sprite-bag.png" /></div>
                <div class="row">


                    <?php
                    remove_filter('the_content', 'wpautop');
                    $loop = new WP_Query( array( 'post_type' => 'product', 'posts_per_page' => 10 ) ); ?>

                    <?php while ( $loop->have_posts() ) : $loop->the_post(); ?>
                        <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 text-center">
                            <div class="product">
                                <?php the_title( '<h3 class="product-title">','</h3>' ); ?>

                                <div class="product-content">
                                    <?php the_content(); ?>
                                </div>
                            </div>
                        </div>
                    <?php endwhile;
                    add_filter('the_content', 'wpautop'); ?>
                </div>
            </div>
        </div>
        <div class="row" id="shopFooter">
            <!-- content located inside this container -->
            <div class="col-md-4 col-md-offset-4 col-xs-6 col-xs-offset-3 text-center">

                <a href="http://music.budzillus.de" target="_blank">Mehr Shoppen!</a>

                <? dynamic_sidebar('shop-section'); ?>

                <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/sprite-horn.png" id="horn" />

            </div>
        </div>
    </div>
</section>

<!-- infinite scroll blog -->
<section id="primary" class="section section-onepage content-area">
    <div class="container">
        <div class="row" id="shopFooter">
            <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1 col-sm-12 col-xs-12">
                <main id="main" class="site-main" role="main">
                    <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/sprite-fish.png" />

                    <h2>News</h2>
                    <?php wp_reset_query(); ?>
                    <?php if ( have_posts() ) : ?>

                        <?php /* Start the Loop */ ?>
                        <?php while ( have_posts() ) : the_post(); ?>

                            <?php
                                /* Include the Post-Format-specific template for the content.
                                 * If you want to override this in a child theme, then include a file
                                 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
                                 */
                                get_template_part( 'content', get_post_format());
                            ?>

                        <?php endwhile; ?>

                        <?php din_theme_paging_nav(); ?>

                    <?php else : ?>

                        <?php get_template_part( 'content', 'none' ); ?>

                    <?php endif; ?>

                </main><!-- #main -->
                <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/sprite-explosion.png" class="text-center img-responsive" id="explosion" />
            </div>
        </div>
    </div>
</section><!-- #primary -->

<!-- Sprites -->
<div id="spriteTemplates">
    <div class="sticky-wrapper" id="bagSprite"><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/sprite-bag.png" /></div>
    <div class="sticky-wrapper" id="clockSprite"><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/sprite-clock.png" /></div>
    <div class="sticky-wrapper" id="cocktailSprite"><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/sprite-cocktail.png" /></div>
    <div class="sticky-wrapper" id="fishSprite"><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/sprite-fish.png" /></div>
    <div class="sticky-wrapper" id="guitarSprite"><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/sprite-guitar.png" /></div>
    <div class="sticky-wrapper" id="hatSprite"><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/sprite-hat.png" /></div>
    <div class="sticky-wrapper" id="hornSprite"><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/sprite-horn.png" /></div>
    <div class="sticky-wrapper" id="monkeySprite"><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/sprite-monkey.png" /></div>
    <div class="sticky-wrapper" id="moonSprite"><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/sprite-moon.png" /></div>
    <div class="sticky-wrapper" id="pantsSprite"><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/sprite-pants.png" /></div>
    <div class="sticky-wrapper" id="saturnSprite"><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/sprite-saturn.png" /></div>
</div>
<?php /* get_sidebar(); */ ?>
<?php get_footer(); ?>
