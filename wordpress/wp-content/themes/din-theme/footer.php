<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package din-theme
 */
?>

	</div><!-- #content -->

    <!-- FOOTER -->
    <nav id="nav-onsite">
        <a href="#top" id="back-to-top-link">
            <i class="fa fa-chevron-up fa-2x"></i>
        </a>
    </nav>
    <footer class="footer container-fluid" id="footer">
        <nav id="footer-nav">
            <div class="row">
                <div class="col-xs-12 col-sm-6 col-sm-offset-3 col-lg-4 col-lg-offset-4">
                    <!-- Newsletter -->
                    <div id="newsletter">
                        <!-- Begin MailChimp Signup Form -->
                        <div id="mc_embed_signup">
                            <form action="//budzillus.us10.list-manage.com/subscribe/post?u=71a04315d4cbef1c887c8b94f&amp;id=8a05e59c85" method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" class="validate" target="_blank" novalidate>
                                <div id="mc_embed_signup_scroll">
                                    <div id="mce-responses" class="clear">
                                        <div class="response" id="mce-error-response" style="display:none"></div>
                                        <div class="response" id="mce-success-response" style="display:none"></div>
                                    </div>    <!-- real people should not fill this in and expect good things - do not remove this or risk form bot signups-->
                                    <div style="position: absolute; left: -5000px;"><input type="text" name="b_71a04315d4cbef1c887c8b94f_c70ce168af" tabindex="-1" value=""></div>

                                    <input type="email" value="" placeholder="Email..." name="EMAIL" class="form-control required email" id="mce-EMAIL">

                                    <input type="submit" value="Newsletter bestellen" name="subscribe" id="mc-embedded-subscribe" class="btn btn-default btn-block">
                                </div>

                            </form>
                        </div>
                        <!--End mc_embed_signup-->
                    </div>
                    <!-- /Newsletter -->
                </div>
            </div>

            <div class="row">
                <div class="col-xs-12 col-sm-6 col-sm-offset-3 col-lg-4 col-lg-offset-4 text-center">
                    <div id="contact-area">
                    <?php
                    if(is_active_sidebar('contact-area')){ ?>

                            <? dynamic_sidebar('contact-area'); ?>

                    <? } ?>

                    <?php
                    if(is_active_sidebar('booking-area')){ ?>
                            <? dynamic_sidebar('booking-area'); ?>
                    <? } ?>

                    <a href="#" data-toggle="modal" data-target="#termsModal">AGB's/Haftungsausschluss</a> <br />
                    &copy; 2015 Budzillus &dash; Crafted by <a href="http://www.wearepictures.com" target="_blank" data-toggle="tooltip" data-placement="right" title="WEAREPICTURES"><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/wearepictures-logo-952e2e.png" /></a>
                </div>
            </div>
        </nav>

    </footer>
    <!-- /FOOTER -->




</div><!--page -->

<!-- Modal Terms Large modal -->
<div id="termsModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="termsModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-body">
                <? dynamic_sidebar('terms-area'); ?>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Schliessen</button>
            </div>

        </div>
    </div>
</div>

<script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.9.1/jquery-ui.min.js"></script>

<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="<?php echo get_stylesheet_directory_uri(); ?>/js/bootstrap.min.js"></script>
<script src="<?php echo get_stylesheet_directory_uri(); ?>/js/jquery-parallax.js"></script>
<!--
<script src="http://cdnjs.cloudflare.com/ajax/libs/gsap/1.15.1/TweenMax.min.js"></script>
<script src="<?php echo get_stylesheet_directory_uri(); ?>/js/_dependent/greensock/plugins/ScrollToPlugin.min.js"></script>
<script src="<?php echo get_stylesheet_directory_uri(); ?>/js/jquery.scrollmagic.js"></script>
<script src="<?php echo get_stylesheet_directory_uri(); ?>/js/jquery.scrollmagic.debug.js"></script>
-->
<script src="<?php echo get_stylesheet_directory_uri(); ?>/js/jquery-timing.min.js"></script>
<script src="<?php echo get_stylesheet_directory_uri(); ?>/js/jquery-smartresize/jquery.debouncedresize.js"></script>
<script src="<?php echo get_stylesheet_directory_uri(); ?>/js/jquery.waypoints.min.js"></script>
<script src="<?php echo get_stylesheet_directory_uri(); ?>/js/datejs/build/date-de-DE.js"></script>
<!-- <script src="<?php echo get_stylesheet_directory_uri(); ?>/js/fullPage.js/jquery.fullPage.min.js"></script> -->
<!-- <script src="<?php echo get_stylesheet_directory_uri(); ?>/js/fullPage.js//vendors/jquery.slimscroll.min.js"></script>
<script src="<?php echo get_stylesheet_directory_uri(); ?>/js/sticky.min.js"></script> -->
<script src="<?php echo get_stylesheet_directory_uri(); ?>/js/app.js"></script>

<?php wp_footer(); ?>

<script>
    (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
        (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
        m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
    })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

    ga('create', 'UA-58639162-1', 'auto');
    ga('send', 'pageview');

</script>


</body>
</html>
