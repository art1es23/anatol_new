<?php if ( is_single() || is_page() ) : ?>
<!-- <div class="clear"></div> -->

<div class="comments">
    <a name="comments-link"></a>
    <?php if ( have_comments() && comments_open() ) : ?>

    <h4 class="comments__title" id="comments">
        <?php comments_number(__('Leave a Comment'), __('One Comment'), '%' . __(' Comments') );?></h4>
    <ul class="comments-list">
        <?php
            wp_list_comments( array(
                'short_ping' => true,
                'callback' => 'better_comments'
            )); ?>

        <?php paginate_comments_links(); ?>
        <?php if ( is_singular() ) wp_enqueue_script( "comment-reply" ); ?>
    </ul>

    <div class="reply"><?php comment_form(); ?></div>
    <?php else :
        if ( comments_open() ) : ?>
    <div class="reply"><?php comment_form(); ?></div>
    <?php endif;
    endif; ?>
</div>

<?php endif; ?>