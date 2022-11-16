
<div class="container">
	<?PHP
	if(!is_front_page() && !is_page('servise-test')) {
		global $title_icon_class;
		global $anatol_cat_title;
		?>
		<div class="<?PHP
		$tmp_icon_class = '';
		if(!empty($title_icon_class)) {
			if($title_icon_class == 'default' && !empty(get_field("title_icon_class"))) {
				$title_icon_class = get_field("title_icon_class");
			}
			$tmp_icon_class = $title_icon_class;
			echo 'title_icon title_icon_'.$title_icon_class;
		} elseif(!empty(get_field("title_icon_class"))) {
			$tmp_icon_class = get_field("title_icon_class");
			echo 'title_icon title_icon_'.get_field("title_icon_class");
		}/* elseif(!empty($title_icon_class)) {
			echo 'title_icon title_icon_'.$title_icon_class;
		}*/

		?>" id="header_title">
		<div class="col-full">
			<div class="title_row">
				<?PHP if(!empty(get_field("title_icon_class")) || !empty($title_icon_class)) {
					if(strpos($tmp_icon_class, 'wicon') !== false) { ?>
						<!--<div class="title_row_icon <?PHP echo $tmp_icon_class; ?>"></div>-->
						<?PHP } else { ?>
							<!--<div class="title_row_icon"></div>-->
							<?php
						}
					}

					if(function_exists('bcn_display')) {
						echo '<div class="breadcrumbs" typeof="BreadcrumbList" vocab="https://schema.org/">';
						bcn_display();
						echo '</div>';
					}?>
					<?php
					if(is_single()){
							if(get_post_type() == 'vacancies'){
								echo '<div class="page-title">' . get_the_title() . '</div>';
							}else{
								echo '<div class="page-title">' . $anatol_cat_title . '</div>';
							}
							
					}else if( is_page( 'calculator' ) ){
						
					}else{
						if(!empty($anatol_cat_title)) {
							echo '<h1>' . $anatol_cat_title . '</h1>';
						} elseif(!empty(get_field("alternative_title"))) {
							echo '<h1>' . get_field("alternative_title") . '</h1>';
						} else {
							the_title('<h1>', '</h1>');
						}
					}



					if(empty($anatol_cat_title)) {
						if(!empty(get_field("title_description"))) {
							echo '<div class="title_description">'.str_replace("\n", '<br />', get_field("title_description")).'</div>';
						}
					}
					?>
				</div>
			</div>
		</div>
		<?PHP
	}
	?>

		</div>