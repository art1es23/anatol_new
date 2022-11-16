<?php global $dm_settings; ?>
<?php if ($dm_settings['show_postmeta'] != 0) : ?>
        <div class="post_time"><?php the_time('F jS, Y'); ?></div>
<?php endif; ?>