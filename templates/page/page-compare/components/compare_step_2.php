<?PHP 

	$page_url = get_permalink(get_the_ID());

	query_posts(array( 
		'post_type' => 'press-compare',
		'showposts' => -1 
	));

	$compare_data 	= array();
	$image 			= array();
	$heading 		= array();
	$indexer 		= array();
	$printhead 		= array();
	$liftlower 		= array();
	$touchscreen 	= array();
	$clamptype		= array();
	$strokeadjust	= array();
	$squeegee 		= array();
	$offcontact 	= array();
	$stepback 		= array();
	$cycles			= array();
	$palletsize 	= array();
	$minconf 		= array();
	$maxconf 		= array();
	$maxscreen 		= array();
	$maxprint		= array();
	$flash 			= array();
	$warranty 		= array();
	$compressor 	= array();
	$link			= array();
	$minimum_configuration   = array();
  $maximum_configuration   = array();
  $maximum_screen_size   = array();
  $standard_pallet_size  = array();
  $screen_clamps   = array();
  $minimum_diameter  = array();
  $pneumatic_screen_clamps   = array();
  $tool_less_adjustments   = array();
  $point_micro_registration  = array();
  $print_head_tension_springs  = array();
  $print_head_spring_tension_adjustment  = array();
  $individual_head_off_contact_adjustment  = array();
  $individual_head_screen_angle_adjustment   = array();
  $laser_alignment_system_included_standard  = array();
  $limited_warranty  = array();
  $pallet_arms   = array();
  $pallets   = array();
  $all_heads_down  = array();
  $flash_cure_units  = array();
  $class_pres = array();
	$lang 			= ICL_LANGUAGE_CODE;

	while(have_posts()) { 
		the_post(); 

		$meta = get_post_meta(get_the_ID());
		if($meta['thetype'][0] == 1) { $thetype = 'ocm661'; }
		elseif($meta['thetype'][0] == 3) { $thetype = 'ocm663'; }
		else { $thetype = 'ocm662'; }

		$zooid = get_field('zooid', get_the_ID());
		$zooid = $zooid[0];
		$zooid = icl_object_id($zooid, 'anatol-products-pres', false, ICL_LANGUAGE_CODE);

		if(!empty($_POST['press'][$zooid]['selected'])) {
			if ($meta['tool_less_adjustments'][0] == 1) {
				$meta['tool_less_adjustments'][0] = '<i class="uk-icon-check-circle uk-text-success uk-icon-small"></i>';
			} else {
				$meta['tool_less_adjustments'][0] = '<i class="uk-icon-remove uk-icon-small uk-text-warning"></i>';
			}

      if ($meta['point_micro_registration'][0] == 1) {
				$meta['point_micro_registration'][0] = '<i class="uk-icon-check-circle uk-text-success uk-icon-small"></i>';
			} else {
				$meta['point_micro_registration'][0] = '<i class="uk-icon-remove uk-icon-small uk-text-warning"></i>';
			}

      if ($meta['print_head_spring_tension_adjustment'][0] == 1) {
				$meta['print_head_spring_tension_adjustment'][0] = '<i class="uk-icon-check-circle uk-text-success uk-icon-small"></i>';
			} else {
				$meta['print_head_spring_tension_adjustment'][0] = '<i class="uk-icon-remove uk-icon-small uk-text-warning"></i>';
			}

      if ($meta['individual_head_off_contact_adjustment'][0] == 1) {
				$meta['individual_head_off_contact_adjustment'][0] = '<i class="uk-icon-check-circle uk-text-success uk-icon-small"></i>';
			} else {
				$meta['individual_head_off_contact_adjustment'][0] = '<i class="uk-icon-remove uk-icon-small uk-text-warning"></i>';
			}

      if ($meta['individual_head_screen_angle_adjustment'][0] == 1) {
				$meta['individual_head_screen_angle_adjustment'][0] = '<i class="uk-icon-check-circle uk-text-success uk-icon-small"></i>';
			} else {
				$meta['individual_head_screen_angle_adjustment'][0] = '<i class="uk-icon-remove uk-icon-small uk-text-warning"></i>';
			}

      if ($meta['laser_alignment_system_included_standard'][0] == 1) {
				$meta['laser_alignment_system_included_standard'][0] = '<i class="uk-icon-check-circle uk-text-success uk-icon-small"></i>';
			} else {
				$meta['laser_alignment_system_included_standard'][0] = '<i class="uk-icon-remove uk-icon-small uk-text-warning"></i>';
			}

      if ($meta['all_heads_down'][0] == 1) {
				$meta['all_heads_down'][0] = 'On models with equal number of colors and stations';
			} else {
				$meta['all_heads_down'][0] = '<i class="uk-icon-remove uk-icon-small uk-text-warning"></i>';
			}
      
			if ($meta['touchscreen'][0] == 1) {
				$meta['touchscreen'][0] = '<i class="uk-icon-check-circle uk-text-success uk-icon-small"></i>';
			} else {
				$meta['touchscreen'][0] = '<i class="uk-icon-remove uk-icon-small uk-text-warning"></i>';
			}

			if ($meta['strokeadjust'][0] == 1) {
				$meta['strokeadjust'][0] = '<i class="uk-icon-check-circle uk-text-success uk-icon-small"></i>';
			} else {
				$meta['strokeadjust'][0] = '<i class="uk-icon-remove uk-icon-small uk-text-warning"></i>';
			}

			if ($meta['squeegee'][0] == 1) {
				$meta['squeegee'][0] = '<i class="uk-icon-check-circle uk-text-success uk-icon-small"></i>';
			} else {
				$meta['squeegee'][0] = '<i class="uk-icon-remove uk-icon-small uk-text-warning"></i>';
			}

    	if ($meta['offcontact'][0] == 1) {
				$meta['offcontact'][0] = '<i class="uk-icon-check-circle uk-text-success uk-icon-small"></i>';
			}

			if ($meta['stepback'][0] == 1) {
				$meta['stepback'][0] = '<i class="uk-icon-check-circle uk-text-success uk-icon-small"></i>';
			}

			if ($meta['stepback'][0] == 2) {
				$meta['stepback'][0] = '<i class="uk-icon-remove uk-icon-small uk-text-warning"></i>';
			}

			$compare_data[$zooid] = $meta;
			if($lang == 'es') {
				$machex = str_replace('Máquinas de', '', get_the_title($zooid));
				$machex = str_replace('Máquina de', '', $machex);
				$machex = str_replace('Impresión', '', $machex);
				$machex = str_replace('Serigrafía', '', $machex);
				$machex = str_replace('Automática', '', $machex);
				$machex = str_replace('Textil', '', $machex);
			} elseif($lang == 'pl') {
				$machex = str_replace('Maszyna do sitodruku', '', get_the_title($zooid));
			} elseif($lang == 'ru') {
				$machex = str_replace('для', '', get_the_title($zooid)); 
				$machex = str_replace('Станок', '', $machex);
				$machex = str_replace('Шелкографии', '', $machex);
			} else {
				$machex = str_replace('Screen Printing Machine', '', get_the_title($zooid));
				$machex = str_replace('Automatic', '', $machex);
			}

			$image[] 		= '<th class="uk-text-center">'.get_the_post_thumbnail($zooid, array(250, 190)).'</th>';
			$heading[] 		= '<th class="uk-h2 uk-text-primary uk-text-center">' . $machex . ' ' . $meta['version'][0] . '</th>';
			$image_heading[]= '<th class="uk-h2 uk-text-primary uk-text-center">'.get_the_post_thumbnail($zooid, array(250, 190)).'<br />'.$machex.' '.$meta['version'][0].'</th>';
			$indexer[] 		= '<td>' . (isset($meta['indexer'][0]) ? $meta['indexer'][0] : '&nbsp;') . '</td>'; 
			$printhead[] 	= '<td>' . (isset($meta['phead'][0]) ? $meta['phead'][0] : '&nbsp;') . '</td>';
			$liftlower[] 	= '<td>' . (isset($meta['liftlower'][0]) ? $meta['liftlower'][0] : '&nbsp;') . '</td>';
			$touchscreen[] 	= '<td>' . (isset($meta['touchscreen'][0]) ? $meta['touchscreen'][0] : '&nbsp;') . '</td>';
			$clamptype[] 	= '<td>' . (isset($meta['clamptype'][0]) ? $meta['clamptype'][0] : '&nbsp;') . '</td>';
			$strokeadjust[] = '<td>' . (isset($meta['strokeadjust'][0]) ? $meta['strokeadjust'][0] : '&nbsp;') . '</td>';
			$squeegee[] 	= '<td>' . (isset($meta['squeegee'][0]) ? $meta['squeegee'][0] : '&nbsp;') . '</td>';
			$offcontact[]	= '<td>' . (isset($meta['offcontact'][0]) ? $meta['offcontact'][0] : '&nbsp;') . '</td>';
			$stepback[] 	= '<td>' . (isset($meta['stepback'][0]) ? $meta['stepback'][0] : '&nbsp;') . '</td>';
			$cycles[] 		= '<td>' . (isset($meta['cycles'][0]) ? $meta['cycles'][0] : '&nbsp;') . '</td>';
			$palletsize[] 	= '<td>' . (isset($meta['palletsize'][0]) ? $meta['palletsize'][0] : '&nbsp;') . '</td>';
			$minconf[] 		= '<td>' . (isset($meta['minconf'][0]) ? $meta['minconf'][0] : '&nbsp;') . '</td>';
			$maxconf[] 		= '<td>' . (isset($meta['maxconf'][0]) ? $meta['maxconf'][0] : '&nbsp;') . '</td>';
			$maxscreen[] 	= '<td>' . (isset($meta['maxscreen'][0]) ? $meta['maxscreen'][0] : '&nbsp;') . '</td>';
			$maxprint[] 	= '<td>' . (isset($meta['maxprint'][0]) ? $meta['maxprint'][0] : '&nbsp;') . '</td>';
			$flash[] 		= '<td>' . (isset($meta['flash'][0]) ? $meta['flash'][0] : '&nbsp;') . '</td>';
			$compressor[] 	= '<td>' . (isset($meta['compressor'][0]) ? $meta['compressor'][0] : '&nbsp;') . '</td>';
			$warranty[] 	= '<td>' . (isset($meta['warranty'][0]) ? $meta['warranty'][0] : '&nbsp;') . '</td>';
			$link[] 		= '<td><a class="button red-button draw-red" href="'.get_permalink($zooid).'"><span>'.__('Details').'</span></a></td>';
      $minimum_configuration[]  = '<td>' . (isset($meta['minimum_configuration'][0]) ? $meta['minimum_configuration'][0] : '&nbsp;') . '</td>';
      $maximum_configuration[]   = '<td>' . (isset($meta['maximum_configuration'][0]) ? $meta['maximum_configuration'][0] : '&nbsp;') . '</td>'; 
      $maximum_screen_size[]  = '<td>' . (isset($meta['maximum_screen_size'][0]) ? $meta['maximum_screen_size'][0] : '&nbsp;') . '</td>'; 
      $standard_pallet_size[]  = '<td>' . (isset($meta['standard_pallet_size'][0]) ? $meta['standard_pallet_size'][0] : '&nbsp;') . '</td>'; 
      $screen_clamps[]   = '<td>' . (isset($meta['screen_clamps'][0]) ? $meta['screen_clamps'][0] : '&nbsp;') . '</td>'; 
      $minimum_diameter[]  = '<td>' . (isset($meta['minimum_diameter'][0]) ? $meta['minimum_diameter'][0] : '&nbsp;') . '</td>'; 
      $pneumatic_screen_clamps[]   = '<td>' . (isset($meta['pneumatic_screen_clamps'][0]) ? $meta['pneumatic_screen_clamps'][0] : '&nbsp;') . '</td>'; 
      $tool_less_adjustments[]   = '<td>' . (isset($meta['tool_less_adjustments'][0]) ? $meta['tool_less_adjustments'][0] : '&nbsp;') . '</td>'; 
      $point_micro_registration[]  = '<td>' . (isset($meta['point_micro_registration'][0]) ? $meta['point_micro_registration'][0] : '&nbsp;') . '</td>'; 
      $print_head_tension_springs[]  = '<td>' . (isset($meta['print_head_tension_springs'][0]) ? $meta['print_head_tension_springs'][0] : '&nbsp;') . '</td>'; 
      $print_head_spring_tension_adjustment[]  = '<td>' . (isset($meta['print_head_spring_tension_adjustment'][0]) ? $meta['print_head_spring_tension_adjustment'][0] : '&nbsp;') . '</td>'; 
      $individual_head_off_contact_adjustment[]  = '<td>' . (isset($meta['individual_head_off_contact_adjustment'][0]) ? $meta['individual_head_off_contact_adjustment'][0] : '&nbsp;') . '</td>'; 
      $individual_head_screen_angle_adjustment[]   = '<td>' . (isset($meta['individual_head_screen_angle_adjustment'][0]) ? $meta['individual_head_screen_angle_adjustment'][0] : '&nbsp;') . '</td>'; 
      $laser_alignment_system_included_standard[]  = '<td>' . (isset($meta['laser_alignment_system_included_standard'][0]) ? $meta['laser_alignment_system_included_standard'][0] : '&nbsp;') . '</td>'; 
      $limited_warranty[]  = '<td>' . (isset($meta['limited_warranty'][0]) ? $meta['limited_warranty'][0] : '&nbsp;') . '</td>'; 
      $pallet_arms[]   = '<td class="td_img_wrap"><span class="' . (isset($meta['pallet_arms'][0]) ? $meta['pallet_arms'][0] : '&nbsp;') . '"></span></td>'; 
      $pallets[]   = '<td>' . (isset($meta['pallets'][0]) ? $meta['pallets'][0] : '&nbsp;') . '</td>'; 
      $all_heads_down[]  = '<td>' . (isset($meta['all_heads_down'][0]) ? $meta['all_heads_down'][0] : '&nbsp;') . '</td>'; 
      $flash_cure_units[]  = '<td>' . (isset($meta['flash_cure_units'][0]) ? $meta['flash_cure_units'][0] : '&nbsp;') . '</td>'; 
      $class_pres[]  = '<p class="table_none">' . (isset($meta['class_pres'][0]) ? $meta['class_pres'][0] : '&nbsp;') . '</p>'; 
		}
	}

	if(!empty($compare_data)) {
?>
<?php echo implode("", $class_pres); ?>
<div class="compare-results">
    <div class="compare-results--wrapper">
        <table style="display:none;" class="automatic_pres uk-table uk-table-condensed uk-table-hover uk-text-center">
            <thead>
                <tr class="ocm-imgs">
                    <th class="ocm-table model_th">
                        <?PHP //_e('Model'); ?>
                    </th>
                    <?php echo implode("",$image_heading); ?>
                </tr>
            </thead>

            <tbody>
                <tr class="ocm-small">
                    <td class="tr_title ocm-table"></td>
                    <td class="uk-text-center" colspan="<?php echo $noselected; ?>"><i class="uk-icon-chevron-down"></i>
                        <?PHP _e('Indexer'); ?>
                    </td>
                </tr>

                <tr>
                    <td class="tr_title ocm-table">
                        <?php	if($lang == 'es') {
                    echo 'Indexador';
                  } 
                  elseif($lang == 'ru') {
                    echo 'Индексатор';
                  }
                  else {
                    echo __('Indexer');
                  } ?></td>
                    <?php echo implode("",$indexer); ?>
                </tr>

                <tr class="ocm-small">
                    <td class="tr_title ocm-table"></td>
                    <td class="uk-text-center" colspan="<?php echo $noselected; ?>"><i class="uk-icon-chevron-down"></i>
                        <?PHP _e('Print Head'); ?>
                    </td>
                </tr>

                <tr>
                    <td class="tr_title ocm-table">
                        <?php	if($lang == 'es') {
                    echo 'Cabeza de Impresión';
                  } 
                  elseif($lang == 'ru') {
                    echo 'Печатающая головка';
                  }
                  else {
                    echo __('Print Head');
                  } ?></td>
                    <?php echo implode("", $printhead); ?>
                </tr>

                <tr class="ocm-small">
                    <td class="tr_title ocm-table"></td>
                    <td class="uk-text-center" colspan="<?php echo $noselected; ?>"><i class="uk-icon-chevron-down"></i>
                        <?PHP _e('Lift/Lower'); ?>
                    </td>
                </tr>

                <tr>
                    <td class="tr_title ocm-table">
                        <?php	if($lang == 'es') {
                    echo 'Elevador/Inferior ';
                  } 
                  elseif($lang == 'ru') {
                    echo 'Подъем/Опускание';
                  }
                  else {
                    echo __('Lift/Lower');
                  } ?></td>
                    <?php echo implode("", $liftlower); ?>
                </tr>

                <tr class="ocm-small">
                    <td class="tr_title ocm-table"></td>
                    <td class="uk-text-center" colspan="<?php echo $noselected; ?>"><i class="uk-icon-chevron-down"></i>
                        <?PHP _e('Touchscreen'); ?>
                    </td>
                </tr>

                <tr>
                    <td class="tr_title ocm-table">
                        <?php	if($lang == 'es') {
                    echo 'Pantalla Táctil';
                  } 
                  elseif($lang == 'ru') {
                    echo 'Сенсорный экран';
                  }
                  else {
                    echo __('Touchscreen');
                  } ?></td>
                    <?php echo implode("", $touchscreen); ?>
                </tr>

                <tr class="ocm-small">
                    <td class="tr_title ocm-table"></td>
                    <td class="uk-text-center" colspan="<?php echo $noselected; ?>"><i class="uk-icon-chevron-down"></i>
                        <?PHP _e('Clamp Type'); ?>
                    </td>
                </tr>

                <tr>
                    <td class="tr_title ocm-table">
                        <?php	if($lang == 'es') {
                    echo 'Tipo de abrazadera';
                  } 
                  elseif($lang == 'ru') {
                    echo 'Тип зажима';
                  }
                  else {
                    echo __('Clamp Type');
                  } ?></td>
                    <?php echo implode("", $clamptype); ?>
                </tr>

                <tr class="ocm-small">
                    <td class="tr_title ocm-table"></td>
                    <td class="uk-text-center" colspan="<?php echo $noselected; ?>"><i class="uk-icon-chevron-down"></i>
                        <?PHP _e('Tool-less Stroke Adjustment'); ?>
                    </td>
                </tr>

                <tr>
                    <td class="tr_title ocm-table">
                        <?php	if($lang == 'es') {
                    echo 'Ajuste sin herramientas';
                  } 
                  elseif($lang == 'ru') {
                    echo 'Регулировка хода без инструментов';
                  }
                  else {
                    echo __('Tool-less Stroke Adjustment');
                  } ?></td>
                    <?php echo implode("", $strokeadjust); ?>
                </tr>

                <tr class="ocm-small">
                    <td class="tr_title ocm-table"></td>
                    <td class="uk-text-center" colspan="<?php echo $noselected; ?>"><i class="uk-icon-chevron-down"></i>
                        <?PHP _e('Independent Squeegee/Flood bar Controls'); ?>
                    </td>
                </tr>

                <tr>
                    <td class="tr_title ocm-table">
                        <?php	if($lang == 'es') {
                    echo 'Control independiente de los squeegee/Flood bars';
                  } 
                  elseif($lang == 'ru') {
                    echo 'Независимая панель управления шваброй/потоком';
                  }
                  else {
                    echo __('Independent Squeegee/Flood bar Controls');
                  } ?></td>
                    <?php echo implode("", $squeegee); ?>
                </tr>

                <tr class="ocm-small">
                    <td class="tr_title ocm-table"></td>
                    <td class="uk-text-center" colspan="<?php echo $noselected; ?>"><i class="uk-icon-chevron-down"></i>
                        <?PHP _e('Central Off-Contact'); ?>
                    </td>
                </tr>

                <tr>
                    <td class="tr_title ocm-table">
                        <?php	if($lang == 'es') {
                    echo 'Central fuera de contacto';
                  } 
                  elseif($lang == 'ru') {
                    echo 'Центральный  Off-Contact';
                  }
                  else {
                    echo __('Central Off-Contact');
                  } ?></td>
                    <?php echo implode("", $offcontact); ?>
                </tr>

                <tr class="ocm-small">
                    <td class="tr_title ocm-table"></td>
                    <td class="uk-text-center" colspan="<?php echo $noselected; ?>"><i class="uk-icon-chevron-down"></i>
                        <?PHP _e('Programmed with Step-Back and Multi Step-Back'); ?>
                    </td>
                </tr>

                <tr>
                    <td class="tr_title ocm-table">
                        <?php	if($lang == 'es') {
                    echo 'Programación de salto atrás y multi salto atrás';
                  } 
                  elseif($lang == 'ru') {
                    echo 'Программирование с Step-Back и Multi Step-Back';
                  }
                  else {
                    echo __('Programmed with Step-Back and Multi Step-Back');
                  } ?></td>
                    <?php echo implode("", $stepback); ?>
                </tr>

                <tr class="ocm-small">
                    <td class="tr_title ocm-table"></td>
                    <td class="uk-text-center" colspan="<?php echo $noselected; ?>"><i class="uk-icon-chevron-down"></i>
                        <?PHP _e('Cycles per Hour'); ?>
                    </td>
                </tr>

                <tr>
                    <td class="tr_title ocm-table">
                        <?php	if($lang == 'es') {
                    echo 'Ciclos por hora';
                  } 
                  elseif($lang == 'ru') {
                    echo 'Циклов в час';
                  }
                  else {
                    echo __('Cycles per Hour');
                  } ?></td>
                    <?php echo implode("", $cycles); ?>
                </tr>

                <tr class="ocm-small">
                    <td class="tr_title ocm-table"></td>
                    <td class="uk-text-center" colspan="<?php echo $noselected; ?>"><i class="uk-icon-chevron-down"></i>
                        <?PHP _e('Standard Pallet Size'); ?>
                    </td>
                </tr>

                <tr>
                    <td class="tr_title ocm-table">
                        <?php	if($lang == 'es') {
                    echo 'Tamaño de paleta estándar';
                  } 
                  elseif($lang == 'ru') {
                    echo 'Стандартный размер поддона';
                  }
                  else {
                    echo __('Standard Pallet Size');
                  } ?></td>
                    <?php echo implode("", $palletsize); ?>
                </tr>

                <tr class="ocm-small">
                    <td class="tr_title ocm-table"></td>
                    <td class="uk-text-center" colspan="<?php echo $noselected; ?>"><i class="uk-icon-chevron-down"></i>
                        <?PHP _e('Minimum configuration'); ?>
                    </td>
                </tr>

                <tr>
                    <td class="tr_title ocm-table">
                        <?php	if($lang == 'es') {
                    echo 'Configuración mínima';
                  } 
                  elseif($lang == 'ru') {
                    echo 'Минимальная конфигурация';
                  }
                  else {
                    echo __('Minimum configuration');
                  } ?></td>
                    <?php echo implode("", $minconf); ?>
                </tr>

                <tr class="ocm-small">
                    <td class="tr_title ocm-table"></td>
                    <td class="uk-text-center" colspan="<?php echo $noselected; ?>"><i class="uk-icon-chevron-down"></i>
                        <?PHP _e('Maximum configuration'); ?>
                    </td>
                </tr>

                <tr>
                    <td class="tr_title ocm-table">
                        <?php	if($lang == 'es') {
                    echo 'Configuración máxima';
                  } 
                  elseif($lang == 'ru') {
                    echo 'Максимальная конфигурация';
                  }
                  else {
                    echo __('Maximum configuration');
                  } ?></td>
                    <?php echo implode("", $maxconf); ?>
                </tr>

                <tr class="ocm-small">
                    <td class="tr_title ocm-table"></td>
                    <td class="uk-text-center" colspan="<?php echo $noselected; ?>"><i class="uk-icon-chevron-down"></i>
                        <?PHP _e('Maximum Screen Size'); ?>
                    </td>
                </tr>

                <tr>
                    <td class="tr_title ocm-table">
                        <?php	if($lang == 'es') {
                    echo 'Tamaño máximo de marco';
                  } 
                  elseif($lang == 'ru') {
                    echo 'Максимальный размер экрана';
                  }
                  else {
                    echo __('Maximum Screen Size');
                  } ?></td>
                    <?php echo implode("", $maxscreen); ?>
                </tr>

                <tr class="ocm-small">
                    <td class="tr_title ocm-table"></td>
                    <td class="uk-text-center" colspan="<?php echo $noselected; ?>"><i class="uk-icon-chevron-down"></i>
                        <?PHP _e('Maximum Print Area'); ?>
                    </td>
                </tr>

                <tr>
                    <td class="tr_title ocm-table">
                        <?php	if($lang == 'es') {
                    echo 'Área máxima de impresión';
                  } 
                  elseif($lang == 'ru') {
                    echo 'Максимальная область печати';
                  }
                  else {
                    echo __('Maximum Print Area');
                  } ?></td>
                    <?php echo implode("", $maxprint); ?>
                </tr>

                <tr class="ocm-small">
                    <td class="tr_title ocm-table"></td>
                    <td class="uk-text-center" colspan="<?php echo $noselected; ?>"><i class="uk-icon-chevron-down"></i>
                        <?PHP _e('Flash'); ?>
                    </td>
                </tr>

                <tr>
                    <td class="tr_title ocm-table">
                        <?php	if($lang == 'es') {
                    echo 'Pre secador';
                  } 
                  elseif($lang == 'ru') {
                    echo 'Межоперационная сушилка';
                  }
                  else {
                    echo __('Flash Cure Units');
                  } ?></td>
                    <?php echo implode("", $flash); ?>
                </tr>

                <tr class="ocm-small">
                    <td class="tr_title ocm-table"></td>
                    <td class="uk-text-center" colspan="<?php echo $noselected; ?>"><i class="uk-icon-chevron-down"></i>
                        <?PHP _e('2-Year Limited Warranty'); ?>
                    </td>
                </tr>

                <tr>
                    <td class="tr_title ocm-table">
                        <?php	if($lang == 'es') {
                    echo 'Garantía limitada';
                  } 
                  elseif($lang == 'ru') {
                    echo 'Ограниченная гарантия';
                  }
                  else {
                    echo __('Limited Warranty');
                  } ?></td>
                    <?php echo implode("", $warranty); ?>
                </tr>

                <tr class="ocm-small">
                    <td class="tr_title ocm-table"></td>
                    <td class="uk-text-center" colspan="<?php echo $noselected; ?>"><i class="uk-icon-chevron-down"></i>
                        <?PHP _e('Requires Compressor'); ?>
                    </td>
                </tr>

                <tr>
                    <td class="tr_title ocm-table">
                        <?php	if($lang == 'es') {
                    echo 'Requiere compresor';
                  } 
                  elseif($lang == 'ru') {
                    echo 'Требуется компрессор';
                  }
                  else {
                    echo __('Requires Compressor');
                  } ?></td>
                    <?php echo implode("", $compressor); ?>
                </tr>

                <tr>
                    <td class="tr_title ocm-table"></td>
                    <?php echo implode("", $link); ?>
                </tr>
            </tbody>
            </thead>
        </table>

        <table style="display:none;" class="manual_pres uk-table uk-table-condensed uk-table-hover uk-text-center">

            <thead>
                <tr class="ocm-imgs">
                    <th class="ocm-table model_th">
                        <?PHP //_e('Model'); ?>
                    </th>
                    <?php echo implode("",$image_heading); ?>
                </tr>
            </thead>

            <tbody>
                <tr class="ocm-small">
                    <td class="tr_title ocm-table"></td>
                    <td class="uk-text-center" colspan="<?php echo $noselected; ?>"><i class="uk-icon-chevron-down"></i>
                        <?PHP _e('Indexer'); ?>
                    </td>
                </tr>

                <tr>
                    <td class="tr_title ocm-table">
                        <?php	if($lang == 'es') {
                  echo __('Minimum Configuration');
                  } 
                  elseif($lang == 'ru') {
                    echo 'Минимальная конфигурация';
                  }
                  else {
                    echo __('Minimum Configuration');
                  } ?></td>
                    <?php echo implode("",$minimum_configuration); ?>
                </tr>

                <tr class="ocm-small">
                    <td class="tr_title ocm-table"></td>
                    <td class="uk-text-center" colspan="<?php echo $noselected; ?>"><i class="uk-icon-chevron-down"></i>
                        <?PHP _e('Print Head'); ?>
                    </td>
                </tr>

                <tr>
                    <td class="tr_title ocm-table">
                        <?php	if($lang == 'es') {
                    echo 'Maximum Configuration';
                  } 
                  elseif($lang == 'ru') {
                    echo 'Максимальная конфигурация';
                  }
                  else {
                    echo __('Maximum Configuration');
                  } ?></td>
                    <?php echo implode("", $maximum_configuration); ?>
                </tr>

                <tr class="ocm-small">
                    <td class="tr_title ocm-table"></td>
                    <td class="uk-text-center" colspan="<?php echo $noselected; ?>"><i class="uk-icon-chevron-down"></i>
                        <?PHP _e('Lift/Lower'); ?>
                    </td>
                </tr>

                <tr>
                    <td class="tr_title ocm-table">
                        <?php	if($lang == 'es') {
                    echo 'Maximum Screen Size';
                  } 
                  elseif($lang == 'ru') {
                    echo 'Максимальный размер экрана';
                  }
                  else {
                    echo __('Maximum Screen Size');
                  } ?></td>
                    <?php echo implode("", $maximum_screen_size); ?>
                </tr>

                <tr class="ocm-small">
                    <td class="tr_title ocm-table"></td>
                    <td class="uk-text-center" colspan="<?php echo $noselected; ?>"><i class="uk-icon-chevron-down"></i>
                        <?PHP _e('Touchscreen'); ?>
                    </td>
                </tr>

                <tr>
                    <td class="tr_title ocm-table">
                        <?php	if($lang == 'es') {
                    echo 'Standard Pallet Size';
                  } 
                  elseif($lang == 'ru') {
                    echo 'Стандартный размер поддона';
                  }
                  else {
                    echo __('Standard Pallet Size');
                  } ?></td>
                    <?php echo implode("", $standard_pallet_size); ?>
                </tr>

                <tr class="ocm-small">
                    <td class="tr_title ocm-table"></td>
                    <td class="uk-text-center" colspan="<?php echo $noselected; ?>"><i class="uk-icon-chevron-down"></i>
                        <?PHP _e('Clamp Type'); ?>
                    </td>
                </tr>

                <tr>
                    <td class="tr_title ocm-table">
                        <?php	if($lang == 'es') {
                    echo 'Screen Clamps';
                  } 
                  elseif($lang == 'ru') {
                    echo 'Зажимы экрана';
                  }
                  else {
                    echo __('Screen Clamps');
                  } ?></td>
                    <?php echo implode("", $screen_clamps); ?>
                </tr>

                <tr class="ocm-small">
                    <td class="tr_title ocm-table"></td>
                    <td class="uk-text-center" colspan="<?php echo $noselected; ?>"><i class="uk-icon-chevron-down"></i>
                        <?PHP _e('Tool-less Stroke Adjustment'); ?>
                    </td>
                </tr>

                <tr>
                    <td class="tr_title ocm-table">
                        <?php	if($lang == 'es') {
                    echo 'Minimum Diameter';
                  } 
                  elseif($lang == 'ru') {
                    echo 'Минимальный диаметр';
                  }
                  else {
                    echo __('Minimum Diameter');
                  } ?></td>
                    <?php echo implode("", $minimum_diameter); ?>
                </tr>

                <tr class="ocm-small">
                    <td class="tr_title ocm-table"></td>
                    <td class="uk-text-center" colspan="<?php echo $noselected; ?>"><i class="uk-icon-chevron-down"></i>
                        <?PHP _e('Independent Squeegee/Flood bar Controls'); ?>
                    </td>
                </tr>

                <tr>
                    <td class="tr_title ocm-table">
                        <?php	if($lang == 'es') {
                    echo 'Pneumatic Screen Clamps';
                  } 
                  elseif($lang == 'ru') {
                    echo 'Пневматические зажимы экрана';
                  }
                  else {
                    echo __('Pneumatic Screen Clamps');
                  } ?></td>
                    <?php echo implode("", $pneumatic_screen_clamps); ?>
                </tr>

                <tr class="ocm-small">
                    <td class="tr_title ocm-table"></td>
                    <td class="uk-text-center" colspan="<?php echo $noselected; ?>"><i class="uk-icon-chevron-down"></i>
                        <?PHP _e('Central Off-Contact'); ?>
                    </td>
                </tr>

                <tr>
                    <td class="tr_title ocm-table">
                        <?php	if($lang == 'es') {
                    echo 'Tool-Less Adjustments';
                  } 
                  elseif($lang == 'ru') {
                    echo 'Регулировка без инструментов';
                  }
                  else {
                    echo __('Tool-Less Adjustments');
                  } ?></td>
                    <?php echo implode("", $tool_less_adjustments ); ?>
                </tr>

                <tr class="ocm-small">
                    <td class="tr_title ocm-table"></td>
                    <td class="uk-text-center" colspan="<?php echo $noselected; ?>"><i class="uk-icon-chevron-down"></i>
                        <?PHP _e('Programmed with Step-Back and Multi Step-Back'); ?>
                    </td>
                </tr>

                <tr>
                    <td class="tr_title ocm-table">
                        <?php	if($lang == 'es') {
                    echo '3-Point Micro Registration';
                  } 
                  elseif($lang == 'ru') {
                    echo '3-точечная микрорегистрация';
                  }
                  else {
                    echo __('3-Point Micro Registration');
                  } ?></td>
                    <?php echo implode("", $point_micro_registration); ?>
                </tr>

                <tr class="ocm-small">
                    <td class="tr_title ocm-table"></td>
                    <td class="uk-text-center" colspan="<?php echo $noselected; ?>"><i class="uk-icon-chevron-down"></i>
                        <?PHP _e('Cycles per Hour'); ?>
                    </td>
                </tr>

                <tr>
                    <td class="tr_title ocm-table">
                        <?php	if($lang == 'es') {
                    echo 'Print Head Tension Springs';
                  } 
                  elseif($lang == 'ru') {
                    echo 'Пружины растяжения печатающей головки';
                  }
                  else {
                    echo __('Print Head Tension Springs');
                  } ?></td>
                    <?php echo implode("", $print_head_tension_springs); ?>
                </tr>

                <tr class="ocm-small">
                    <td class="tr_title ocm-table"></td>
                    <td class="uk-text-center" colspan="<?php echo $noselected; ?>"><i class="uk-icon-chevron-down"></i>
                        <?PHP _e('Standard Pallet Size'); ?>
                    </td>
                </tr>

                <tr>
                    <td class="tr_title ocm-table">
                        <?php	if($lang == 'es') {
                    echo 'Print Head Spring Tension Adjustment';
                  } 
                  elseif($lang == 'ru') {
                    echo 'Регулировка натяжения пружины печатающей головки';
                  }
                  else {
                    echo __('Print Head Spring Tension Adjustment');
                  } ?></td>
                    <?php echo implode("", $print_head_spring_tension_adjustment); ?>
                </tr>

                <tr class="ocm-small">
                    <td class="tr_title ocm-table"></td>
                    <td class="uk-text-center" colspan="<?php echo $noselected; ?>"><i class="uk-icon-chevron-down"></i>
                        <?PHP _e('Minimum configuration'); ?>
                    </td>
                </tr>

                <tr>
                    <td class="tr_title ocm-table">
                        <?php	if($lang == 'es') {
                    echo 'Individual Head Off-Contact Adjustment';
                  } 
                  elseif($lang == 'ru') {
                    echo 'Индивидуальная регулировка отключения головы';
                  }
                  else {
                    echo __('Individual Head Off-Contact Adjustment');
                  } ?></td>
                    <?php echo implode("", $individual_head_off_contact_adjustment); ?>
                </tr>

                <tr class="ocm-small">
                    <td class="tr_title ocm-table"></td>
                    <td class="uk-text-center" colspan="<?php echo $noselected; ?>"><i class="uk-icon-chevron-down"></i>
                        <?PHP _e('Maximum configuration'); ?>
                    </td>
                </tr>

                <tr>
                    <td class="tr_title ocm-table">
                        <?php	if($lang == 'es') {
                    echo 'Laser Alignment System Included Standard';
                  } 
                  elseif($lang == 'ru') {
                    echo 'Лазерная система выравнивания входит в стандартную комплектацию';
                  }
                  else {
                    echo __('Laser Alignment System Included Standard');
                  } ?></td>
                    <?php echo implode("", $laser_alignment_system_included_standard); ?>
                </tr>

                <tr class="ocm-small">
                    <td class="tr_title ocm-table"></td>
                    <td class="uk-text-center" colspan="<?php echo $noselected; ?>"><i class="uk-icon-chevron-down"></i>
                        <?PHP _e('Maximum Screen Size'); ?>
                    </td>
                </tr>

                <tr>
                    <td class="tr_title ocm-table">
                        <?php	if($lang == 'es') {
                          echo 'Pallet Arms';
                          } 
                          elseif($lang == 'ru') {
                          echo 'Паллетное оружие';
                          }
                          else {
                           echo __('Pallet Arms');
                          } ?></td>
                    <?php echo implode("", $pallet_arms); ?>
                </tr>

                <tr class="ocm-small">
                    <td class="tr_title ocm-table"></td>
                    <td class="uk-text-center" colspan="<?php echo $noselected; ?>"><i class="uk-icon-chevron-down"></i>
                        <?PHP _e('Flash'); ?>
                    </td>
                </tr>

                <tr>
                    <td class="tr_title ocm-table">
                        <?php	if($lang == 'es') {
                    echo 'Limited Warranty';
                  } 
                  elseif($lang == 'ru') {
                    echo 'Ограниченная гарантия';
                  }
                  else {
                    echo __('Limited Warranty');
                  } ?></td>
                    <?php echo implode("", $limited_warranty); ?>
                </tr>

                <tr class="ocm-small">
                    <td class="tr_title ocm-table"></td>
                    <td class="uk-text-center" colspan="<?php echo $noselected; ?>"><i class="uk-icon-chevron-down"></i>
                        <?PHP _e('Maximum Print Area'); ?>
                    </td>
                </tr>

                <tr>
                    <td class="tr_title ocm-table">
                        <?php	if($lang == 'es') {
                    echo 'Pallets';
                  } 
                  elseif($lang == 'ru') {
                    echo 'Поддоны';
                  }
                  else {
                    echo __('Pallets');
                  } ?></td>
                    <?php echo implode("", $pallets); ?>
                </tr>

                <tr class="ocm-small">
                    <td class="tr_title ocm-table"></td>
                    <td class="uk-text-center" colspan="<?php echo $noselected; ?>"><i class="uk-icon-chevron-down"></i>
                        <?PHP _e('2-Year Limited Warranty'); ?>
                    </td>
                </tr>

                <tr>
                    <td class="tr_title ocm-table">
                        <?php	if($lang == 'es') {
                    echo 'All-Heads-Down';
                  } 

                  elseif($lang == 'ru') {
                    echo 'Все головы вниз';
                  }
                  else {
                    echo __('All-Heads-Down');
                  } ?></td>
                    <?php echo implode("", $all_heads_down); ?>
                </tr>

                <tr class="ocm-small">
                    <td class="tr_title ocm-table"></td>
                    <td class="uk-text-center" colspan="<?php echo $noselected; ?>"><i class="uk-icon-chevron-down"></i>
                        <?PHP _e('Requires Compressor'); ?>
                    </td>
                </tr>

                <tr>
                    <td class="tr_title ocm-table">
                        <?php	if($lang == 'es') {
                    echo 'Flash Cure Units';
                  } 
                  elseif($lang == 'ru') {
                    echo 'Межоперационные сушилки';
                  }
                  else {
                    echo __('Flash Cure Units');
                  } ?></td>
                    <?php echo implode("", $flash_cure_units); ?>
                </tr>

                <tr class="ocm-small">
                    <td class="tr_title ocm-table"></td>
                    <td class="uk-text-center" colspan="<?php echo $noselected; ?>"><i class="uk-icon-chevron-down"></i>
                        <?PHP _e('2-Year Limited Warranty'); ?>
                    </td>
                </tr>

                <tr>
                    <td class="tr_title ocm-table">
                        <?php	if($lang == 'es') {
                            echo 'Individual Head Screen Angle Adjustment';
                            }
                            elseif($lang == 'ru') {
                          echo 'Индивидуальная регулировка угла наклона головного экрана';
                          }
                          else {
                          echo __('Individual Head Screen Angle Adjustment');
                          } ?></td>
                    <?php echo implode("", $individual_head_screen_angle_adjustment); ?>
                </tr>

                <tr>
                    <td class="tr_title ocm-table"></td>
                    <?php echo implode("", $link); ?>
                </tr>

            </tbody>
            </thead>
        </table>
    </div>

    <div class="compare-filter compare_menu_bottom">
        <div class="compare-filter__item--footer">
            <!-- <div class="cm_row2_helper"> -->
            <a href="<?PHP echo $page_url; ?>"
                class="button red-button draw-red"><?php _e('New comparison', 'anatol'); ?></a>
            <!-- </div> -->
        </div>
    </div>
</div>

<style type="text/css">
#tm-main {
    padding: 0 !important;
    background: transparent !important;
}

.table_none {
    opacity: 0;
    position: absolute;
}

#tm-main .uk-container-center {
    padding: 0 !important
}

.table_block {
    display: table !important
}

@media (max-width:768px) {
    .ocm-table {
        width: 30%;
        display: none;
    }
}

@media (min-width:769px) {
    .ocm-small {
        display: none !important
    }
}

@media (max-width:550px) {
    .ocm-imgs {
        display: none !important
    }
}
</style>

<?PHP
	} else {
		get_template_part('templates/page/page-compare/components/compare_step_1');
	}
?>

<script>
let class_table = document.querySelectorAll('.table_none');
let select_class = document.querySelector(`.${class_table[0].innerHTML}`);
select_class.classList.add('table_block')
</script>