	<section class="section-home-press" id="section2">
	    <div class="tabs">
	        <input type="radio" id="tab1" name="tab-control" checked>
	        <input type="radio" id="tab2" name="tab-control">
	        <input type="radio" id="tab3" name="tab-control">
	        <input type="radio" id="tab4" name="tab-control">
	        <input type="radio" id="tab5" name="tab-control">

	        <ul>
	            <li title="Screen Printing Presses">
	                <label for="tab1" role="button">
	                    <span>Screen Printing Presses</span>
	                </label>
	            </li>
	            <li title="Conveyor Dryers">
	                <label for="tab2" role="button">
	                    <span>Conveyor Dryers</span>
	                </label>
	            </li>
	            <li title="Flash Cure Unit">
	                <label for="tab3" role="button">
	                    <span>Flash Cure Unit</span>
	                </label>
	            </li>

	            <li title="Pre-Press Equipment">
	                <label for="tab4" role="button">
	                    <span>Pre-Press Equipment</span>
	                </label>
	            </li>

	            <li title="Printing Accessories">
	                <label for="tab5" role="button">
	                    <span>Printing Accessories</span>
	                </label>
	            </li>
	        </ul>

	        <div class="content">
	            <div class="tab_item">
	                <div class="tab_item_cont home_equipments">

	                    <?php $the_query = new WP_Query(array('post_type' => 'anatol-products-pres' )); ?>
	                    <?php if ($the_query->have_posts()) : ?>
	                    <?php while ($the_query->have_posts()) : $the_query->the_post(); ?>
	                    <?php if (get_field('show_on_home_page') === true ) : ?>
	                    <div class="equipment_item">
	                        <a href="<?php the_permalink(); ?>" class="equipment_btn">
	                            <div class="image_part">
	                                <?php if ( has_post_thumbnail()) { the_post_thumbnail('medium'); } ?></div>
	                            <div class="equipment_info">
	                                <div class="title_part">
	                                    <h3 class="item_title"><?php the_title(); ?></h3>
	                                </div>

	                                <div class="equipment-footer">
	                                    <div class="main-parameters">
	                                        <div class="param-left">
	                                            <i class="fas fa-expand"></i>
	                                            <span class="label-name">Maximum print area</span>
	                                            <span class="value d-block">15” x 16” up to 20” x 28”</span>
	                                        </div>
	                                        <div class="param-right">
	                                            <i class="fas fa-fill-drip"></i>
	                                            <span class="label-name">Stations/colors</span>
	                                            <span class="value d-block">6/4 up to 20/18</span>
	                                        </div>
	                                    </div>
	                                </div>

	                            </div>
	                        </a>
	                    </div>
	                    <?php endif; ?>
	                    <?php endwhile; ?>
	                    <?php wp_reset_postdata(); ?>
	                    <?php endif; ?>
	                </div>
	            </div>
	            <div class="tab_item">
	                <div class="tab_item_cont home_equipments">

	                    <?php $the_query = new WP_Query(array('post_type' => 'anatol-products-conv' )); ?>
	                    <?php if ($the_query->have_posts()) : ?>
	                    <?php while ($the_query->have_posts()) : $the_query->the_post(); ?>
	                    <?php if (get_field('show_on_home_page') === true ) : ?>
	                    <div class="equipment_item">
	                        <a href="<?php the_permalink(); ?>" class="equipment_btn">
	                            <div class="image_part"><?php if ( has_post_thumbnail()) { the_post_thumbnail(''); } ?>
	                            </div>
	                            <div class="equipment_info">
	                                <div class="title_part">
	                                    <h3 class="item_title"><?php the_title(); ?></h3>
	                                </div>


	                            </div>
	                        </a>
	                    </div>
	                    <?php endif; ?>
	                    <?php endwhile; ?>
	                    <?php wp_reset_postdata(); ?>
	                    <?php endif; ?>

	                </div>
	            </div>
	            <div class="tab_item">
	                <h2>Returns</h2>
	                <div class="tab_item_cont home_equipments">


	                    <?php $the_query = new WP_Query(array('post_type' => 'anatol-products-flas' )); ?>
	                    <?php if ($the_query->have_posts()) : ?>
	                    <?php while ($the_query->have_posts()) : $the_query->the_post(); ?>
	                    <?php if (get_field('show_on_home_page') === true ) : ?>
	                    <div class="equipment_item">
	                        <a href="<?php the_permalink(); ?>" class="equipment_btn">
	                            <div class="image_part"><?php if ( has_post_thumbnail()) { the_post_thumbnail(''); } ?>
	                            </div>
	                            <div class="equipment_info">
	                                <div class="title_part">
	                                    <h3 class="item_title"><?php the_title(); ?></h3>
	                                </div>
	                            </div>
	                        </a>
	                    </div>
	                    <?php endif; ?>
	                    <?php endwhile; ?>
	                    <?php wp_reset_postdata(); ?>
	                    <?php endif; ?>


	                    <div class="equipment_item">
	                        <a href="#" class="">
	                            <div class="image_part">
	                                <div class="sticker_new">NEW</div>
	                                <img width="300" height="210"
	                                    src="https://anatol.com/wp-content/uploads/2020/12/Comet-Light-Flash-Cure-Unit-2-300x210.jpg"
	                                    loading="lazy" class="lozad" alt="Comet Light Flash Cure Unit">
	                            </div>
	                            <div class="content_part">
	                                <div class="c_icon">
	                                    <div class="c_default"></div>
	                                </div>
	                                <div class="equipment_box_title">Comet Light Flash Cure Unit</div>
	                                <blockquote>
	                                    <p>The speed and efficiency of quartz flash curing in our most affordable
	                                        package<br><span style="color: #cc0000;"> Curing area of: </span><br>16″ x 18″,
	                                        20″ x 24″ or 20″ x 28″</p>
	                                </blockquote>
	                            </div>
	                        </a>
	                    </div>
	                    </a>
	                </div>
	            </div>
	            <div class="tab_item">
	                <div class="tab_item_cont home_equipments">

	                    <div class="equipment_item"> <a href="https://anatol.com/pre-press/quik-kote/" class="">
	                            <div class="image_part">
	                                <div class="sticker_new">NEW</div>
	                                <img width="300" height="210"
	                                    src="https://anatol.com/wp-content/uploads/2020/09/QUIK-KOTE-01-300x210.jpg"
	                                    loading="lazy" class="lozad attachment-300x210 size-300x210 wp-post-image" alt="">
	                            </div>
	                            <div class="content_part">
	                                <div class="c_icon">
	                                    <div class="c_default"></div>
	                                </div>
	                                <div class="equipment_box_title">Quik-Kote</div>
	                                <blockquote>
	                                    <p>Automatic Emulsion Coating Machine<br><span style="color: #cc0000;"> For screen
	                                            sizes: </span><br>20” x 24” up to 26” x 43”</p>
	                                </blockquote>
	                            </div>
	                        </a></div>


	                    <?php $the_query = new WP_Query(array('post_type' => 'anatol-products-pre-' )); ?>
	                    <?php if ($the_query->have_posts()) : ?>
	                    <?php while ($the_query->have_posts()) : $the_query->the_post(); ?>
	                    <?php if (get_field('show_on_home_page') === true ) : ?>
	                    <div class="equipment_item">
	                        <a href="<?php the_permalink(); ?>" class="equipment_btn">
	                            <div class="image_part"><?php if ( has_post_thumbnail()) { the_post_thumbnail(''); } ?>
	                            </div>
	                            <div class="equipment_info">
	                                <div class="title_part">
	                                    <h3 class="item_title"><?php the_title(); ?></h3>
	                                </div>


	                            </div>
	                        </a>
	                    </div>
	                    <?php endif; ?>
	                    <?php endwhile; ?>
	                    <?php wp_reset_postdata(); ?>
	                    <?php endif; ?>

	                </div>
	            </div>
	            <div class="tab_item">

	                <div class="tab_item_cont home_equipments">
	                    <div class="equipment_item">
	                        <a href="https://anatol.com/accessories/big-forge-in-line-heat-press/" class="">
	                            <div class="image_part">
	                                <div class="sticker_new">NEW</div>
	                                <img width="300" height="210"
	                                    src="https://anatol.com/wp-content/uploads/2020/12/BIG-FORGE-300x210.jpg"
	                                    loading="lazy" class="lozad attachment-300x210 size-300x210 wp-post-image"
	                                    alt="BIG FORGE IN-LINE HEAT PRESS">
	                            </div>
	                            <div class="content_part">
	                                <div class="c_icon">
	                                    <div class="c_default"></div>
	                                </div>
	                                <div class="equipment_box_title">Big Forge – In-line Heat Press</div>
	                                <blockquote>
	                                    <p>Heat press for Anatol automatic&nbsp;screen printing machines</p>
	                                </blockquote>
	                            </div>
	                        </a>
	                    </div>
	                </div>
	            </div>
	        </div>
	    </div>

	</section>