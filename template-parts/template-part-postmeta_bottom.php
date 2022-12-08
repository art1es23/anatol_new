<?php global $dm_settings; ?>
<?php if ($dm_settings['show_postmeta'] != 0) : ?>
    <div class="bottom_postmeta"> 
        <?PHP /*<p class="post_author">
            <?php the_author_posts_link(); ?>
        </p>*/ ?>
        <p class="posted_cats"><?php _e('Posted In'); ?>: <?php the_category(', '); ?></p>
        <?php if( has_tag() ) : ?>
            <p class="posted_cats posted_tags">
            <?php the_tags(); ?>
            </p>
        <?php endif; ?>
    </div>
<?php endif; ?>