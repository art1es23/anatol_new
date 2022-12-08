
    <div class="sidebar-right">
    <div class="latest_from_blog widget widget_block">
	
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
				<div class="block_rel_title">
					<h3>Recent Articles</h3>
				</div>

<div class="latest_blogs_cont">
<?php
    while ( $rel_query->have_posts() ) :
        $rel_query->the_post();
?>
			<div class="latest_blog_item">
				<a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>">
					<div class="">
						<div class="latest_blog_thumbnail"><?php the_post_thumbnail('medium'); ?></div>
						
						<div class="latest_blog_title"><?php the_title(); ?></div>
					</div>						
				</a>
			</div>
<?php endwhile; ?>

</div>
<?php 
	endif;
	wp_reset_query();
?>
    </div>
	
        <?php dynamic_sidebar( 'Right Sidebar' ); ?>
    </div>
	