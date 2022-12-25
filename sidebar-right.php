<aside class="sidebar-right sidebar">
    <!-- <div class="latest_from_blog widget widget_block"> -->

    <div class="sidebar--wrapper">

        <?php
		global $post;
		$current_post_type = get_post_type( $post );

		$args = array(
			'posts_per_page' => 4,
			'order' => 'DESC',
			'orderby' => 'ID',
			'post_type' => $current_post_type,
			'post__not_in' => array( $post->ID )
		);

		$rel_query = new WP_Query( $args );

		if( $rel_query->have_posts() ) : 
	?>

        <h3 class="sidebar__title">Recent Articles</h3>

        <div class="sidebar-content">
            <?php while ( $rel_query->have_posts() ) :
					$rel_query->the_post();
			?>

            <a class="sidebar-content__item sidebar-post" href="<?php the_permalink() ?>" rel="bookmark"
                title="<?php the_title_attribute(); ?>">
                <div class="sidebar-post__img"><?php the_post_thumbnail('medium'); ?></div>

                <div class="sidebar-post__title"><?php the_title(); ?></div>
            </a>
            <?php endwhile; ?>

        </div>
        <?php endif;
			wp_reset_query(); ?>
    </div>

    <?php dynamic_sidebar( 'Right Sidebar' ); ?>
</aside>