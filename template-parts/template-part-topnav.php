    <nav class="anatol-header-menu navbar navbar-inverse" role="navigation">
        <?php if ( has_nav_menu( 'main_menu' ) ) : ?>
        <div id="main-menu" class="main-nav">
            <?php
				wp_nav_menu(array(
					'theme_location'  => 'main_menu',
					//'fallback_cb'     => false,
					//'menu_id'         => 'main-nav',
					'container'=> false,
					//'menu_class'        => 'nav navbar-nav',
					'items_wrap'      => '<ul class="main-menu">%3$s</ul>',
					'walker' => new Prio_Walker()
				));?>

            <div class="topmenu_cart_mob">
                <?php global $woocommerce; ?>
                <a class="menu-cart" href="<?php echo wc_get_cart_url(); ?>"
                    title="<?php _e('Cart View', 'woothemes'); ?>">

                    <i class="fa fa-shopping-cart"></i>
                    <span
                        class="mini_count"><?php echo sprintf(_n('%d item', $woocommerce->cart->cart_contents_count, 'woothemes'), $woocommerce->cart->cart_contents_count);?></span>
                </a>

                <div class="mini_cart_content">
                    <div class="widget_shopping_cart_content"><?php woocommerce_mini_cart();?></div>
                </div>
            </div>

            <div class="lang_swither_mob">
                <?PHP echo languages_list_mob(); ?>
            </div>

        </div>
        <?php endif; ?>
    </nav>