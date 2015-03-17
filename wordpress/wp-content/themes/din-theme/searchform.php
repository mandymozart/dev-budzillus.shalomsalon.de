<?php
/**
 * The template for displaying search form.
 *
 * @package din-theme
 */
?>
<form role="search" method="get" id="searchform" class="searchform" action="<?php echo esc_url( home_url( '/' ) ); ?>">
	<div>
        <div class="input-group">
              <input
                        value="<?php echo get_search_query(); ?>"
                        type="text"
                        id="s"
                        name="s"
                        class="form-control">
            <span class="input-group-btn">
                <button class="btn btn-default" type="submit" id="searchsubmit"><span class="fa fa-search fa-inverse"></span></button>
              </span>
        </div><!-- /input-group -->
    </div>
</form>