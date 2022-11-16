<form role="search" method="get" id="searchform" class="searchform" action="<?php echo esc_url( home_url( '/' ) ); ?>">
  <div>
    <label class="screen-reader-text" for="s"><?php _e( 'Search for:', 'anatol' ); ?></label>
    <input type="text" value="" name="s" id="s" placeholder="fasdfad<?php echo _e( 'Search ', 'anatol' ); ?>">
    <input type="submit" id="searchsubmit" value="Search">
  </div>
</form>
