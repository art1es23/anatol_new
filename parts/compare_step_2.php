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
		
			if ($meta['warranty'][0] == 1) {
				$meta['warranty'][0] = '<i class="uk-icon-check-circle uk-text-success uk-icon-small"></i>';
			}/*  else {
				$meta['warranty'][0] = '<i class="uk-icon-remove uk-icon-small uk-text-warning"></i>';
			} */
		
			if ($meta['compressor'][0] == 1) {
				$meta['compressor'][0] = '<i class="uk-icon-check-circle uk-text-success uk-icon-small"></i>';
			}/*  else {
				$meta['compressor'][0] = '<i class="uk-icon-remove uk-icon-small uk-text-warning"></i>';
			} */
		
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
			} 
			elseif($lang == 'pl') {
				$machex = str_replace('Maszyna do sitodruku', '', get_the_title($zooid));
			}
			elseif($lang == 'ru') {
				$machex = str_replace('для', '', get_the_title($zooid)); 
				$machex = str_replace('Станок', '', $machex);
				$machex = str_replace('Шелкографии', '', $machex);
				//$machex = str_replace('к', '', $machex);
			}
			else {
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
			$warranty[] 	= '<td>' . (isset($meta['warranty'][0]) ? $meta['warranty'][0] : '&nbsp;') . '</td>';
			$compressor[] 	= '<td>' . (isset($meta['compressor'][0]) ? $meta['compressor'][0] : '&nbsp;') . '</td>';
			$link[] 		= '<td><a class="button white_button" href="'.get_permalink($zooid).'"><span>'.__('Details').'</span></a></td>';
			//$link[] 		= '<td><a class="button white_button" href="'.get_permalink($zooid).'"><span> > </span></a></td>';
			
			
		}
	}
	
	if(!empty($compare_data)) {
		?>        
        <div class="compare_results">
        	<div class="overflow-container">
                <table class="uk-table uk-table-condensed uk-table-hover uk-text-center">
                    <thead>
                        <tr class="ocm-imgs">
                            <th class="ocm-table model_th"><?PHP //_e('Model'); ?></th>
                            <?php echo implode("",$image_heading); ?>
                        </tr>
                    </thead>
                    <tbody>
                        <tr class="ocm-small"><td class="uk-text-right ocm-table"></td>
                            <td class="uk-text-center" colspan="<?php echo $noselected; ?>"><i class="uk-icon-chevron-down"></i> <?PHP _e('Indexer'); ?></td>	
                        </tr>
                        <tr>
                        <td class="uk-text-right ocm-table">
                        <?php	if($lang == 'es') {
                    echo 'Indexador';
                  } 
                  elseif($lang == 'pl') {
                    echo 'Indekser';
                  }
                  else {
                    echo __('Indexer');
                  } ?></td>	
                        <?php echo implode("",$indexer); ?>
                        </tr>
                        <tr class="ocm-small"><td class="uk-text-right ocm-table"></td>
                            <td class="uk-text-center" colspan="<?php echo $noselected; ?>"><i class="uk-icon-chevron-down"></i> <?PHP _e('Print Head'); ?></td>	
                        </tr>
                        <tr>
                        <td class="uk-text-right ocm-table">
                            <?php	if($lang == 'es') {
                    echo 'Cabeza de Impresión';
                  } 
                  elseif($lang == 'pl') {
                    echo 'Głowica drukująca';
                  }
                  else {
                    echo __('Print Head');
                  } ?></td>
                        <?php echo implode("", $printhead); ?>
                        </tr>
                        <tr class="ocm-small"><td class="uk-text-right ocm-table"></td>
                            <td class="uk-text-center" colspan="<?php echo $noselected; ?>"><i class="uk-icon-chevron-down"></i> <?PHP _e('Lift/Lower'); ?></td>	
                        </tr>
                        <tr>
                        <td class="uk-text-right ocm-table">
                            <?php	if($lang == 'es') {
                    echo 'Elevador/Inferior ';
                  } 
                  elseif($lang == 'pl') {
                    echo 'Podnoszenie';
                  }
                  else {
                    echo __('Lift/Lower');
                  } ?></td>
                        <?php echo implode("", $liftlower); ?>
                        </tr>
                        <tr class="ocm-small"><td class="uk-text-right ocm-table"></td>
                            <td class="uk-text-center" colspan="<?php echo $noselected; ?>"><i class="uk-icon-chevron-down"></i> <?PHP _e('Touchscreen'); ?></td>	
                        </tr>
                        <tr>
                        <td class="uk-text-right ocm-table">
                                    <?php	if($lang == 'es') {
                    echo 'Pantalla Táctil';
                  } 
                  elseif($lang == 'pl') {
                    echo 'Ekran dotykowy';
                  }
                  else {
                    echo __('Touchscreen');
                  } ?></td>
                        <?php echo implode("", $touchscreen); ?>
                        </tr>
                        <tr class="ocm-small"><td class="uk-text-right ocm-table"></td>
                            <td class="uk-text-center" colspan="<?php echo $noselected; ?>"><i class="uk-icon-chevron-down"></i> <?PHP _e('Clamp Type'); ?></td>	
                        </tr>
                        <tr>
                        <td class="uk-text-right ocm-table">
                                        <?php	if($lang == 'es') {
                    echo 'Tipo de abrazadera';
                  } 
                  elseif($lang == 'pl') {
                    echo 'Rodzaj Zacisku';
                  }
                  else {
                    echo __('Clamp Type');
                  } ?></td>
                        <?php echo implode("", $clamptype); ?>
                        </tr>
                        <tr class="ocm-small"><td class="uk-text-right ocm-table"></td>
                            <td class="uk-text-center" colspan="<?php echo $noselected; ?>"><i class="uk-icon-chevron-down"></i> <?PHP _e('Tool-less Stroke Adjustment'); ?></td>	
                        </tr>
                        <tr>
                        <td class="uk-text-right ocm-table">
                    <?php	if($lang == 'es') {
                    echo 'Ajuste sin herramientas';
                  } 
                  elseif($lang == 'pl') {
                    echo 'Beznarzędziowa Regulacja Skoku';
                  }
                  else {
                    echo __('Tool-less Stroke Adjustment');
                  } ?></td>
                        <?php echo implode("", $strokeadjust); ?>
                        </tr>
                        <tr class="ocm-small"><td class="uk-text-right ocm-table"></td>
                            <td class="uk-text-center" colspan="<?php echo $noselected; ?>"><i class="uk-icon-chevron-down"></i> <?PHP _e('Independent Squeegee/Flood bar Controls'); ?></td>	
                        </tr>
                        <tr>
                        <td class="uk-text-right ocm-table">
                    <?php	if($lang == 'es') {
                    echo 'Control independiente de los squeegee/Flood bars';
                  } 
                  elseif($lang == 'pl') {
                    echo 'Niezależna Kontrola Rakli/Przedrakli';
                  }
                  else {
                    echo __('Independent Squeegee/Flood bar Controls');
                  } ?></td>
                        <?php echo implode("", $squeegee); ?>
                        </tr>
                        <tr class="ocm-small"><td class="uk-text-right ocm-table"></td>
                            <td class="uk-text-center" colspan="<?php echo $noselected; ?>"><i class="uk-icon-chevron-down"></i> <?PHP _e('Central Off-Contact'); ?></td>	
                        </tr>
                        <tr>
                        <td class="uk-text-right ocm-table">
                    <?php	if($lang == 'es') {
                    echo 'Central fuera de contacto';
                  } 
                  elseif($lang == 'pl') {
                    echo 'Centralny Off-Contact';
                  }
                  else {
                    echo __('Central Off-Contact');
                  } ?></td>
                        <?php echo implode("", $offcontact); ?>
                        </tr>
                        <tr class="ocm-small"><td class="uk-text-right ocm-table"></td>
                            <td class="uk-text-center" colspan="<?php echo $noselected; ?>"><i class="uk-icon-chevron-down"></i> <?PHP _e('Programmed with Step-Back and Multi Step-Back'); ?></td>	
                        </tr>
                        <tr>
                        <td class="uk-text-right ocm-table">
                            <?php	if($lang == 'es') {
                    echo 'Programación de salto atrás y multi salto atrás';
                  } 
                  elseif($lang == 'pl') {
                    echo 'Programowanie z Step-Back i Multi Step-Back';
                  }
                  else {
                    echo __('Programmed with Step-Back and Multi Step-Back');
                  } ?></td>
                        <?php echo implode("", $stepback); ?>
                        </tr>
                        <tr class="ocm-small"><td class="uk-text-right ocm-table"></td>
                            <td class="uk-text-center" colspan="<?php echo $noselected; ?>"><i class="uk-icon-chevron-down"></i> <?PHP _e('Cycles per Hour'); ?></td>	
                        </tr>
                        <tr>
                        <td class="uk-text-right ocm-table">
                    <?php	if($lang == 'es') {
                    echo 'Ciclos por hora';
                  } 
                  elseif($lang == 'pl') {
                    echo 'Cykle na godzinę';
                  }
                  else {
                    echo __('Cycles per Hour');
                  } ?></td>
                        <?php echo implode("", $cycles); ?>
                        </tr>
                        <tr class="ocm-small"><td class="uk-text-right ocm-table"></td>
                            <td class="uk-text-center" colspan="<?php echo $noselected; ?>"><i class="uk-icon-chevron-down"></i> <?PHP _e('Standard Pallet Size'); ?></td>	
                        </tr>
                        <tr>
                        <td class="uk-text-right ocm-table">
                    <?php	if($lang == 'es') {
                    echo 'Tamaño de paleta estándar';
                  } 
                  elseif($lang == 'pl') {
                    echo 'Standardowy Rozmiar Palety';
                  }
                  else {
                    echo __('Standard Pallet Size');
                  } ?></td>
                        <?php echo implode("", $palletsize); ?>
                        </tr>
                        <tr class="ocm-small"><td class="uk-text-right ocm-table"></td>
                            <td class="uk-text-center" colspan="<?php echo $noselected; ?>"><i class="uk-icon-chevron-down"></i> <?PHP _e('Minimum configuration'); ?></td>	
                        </tr>
                        <tr>
                        <td class="uk-text-right ocm-table">
                    <?php	if($lang == 'es') {
                    echo 'Configuración mínima';
                  } 
                  elseif($lang == 'pl') {
                    echo 'Minimalna Konfiguracja';
                  }
                  else {
                    echo __('Minimum configuration');
                  } ?></td>
                        <?php echo implode("", $minconf); ?>
                        </tr>
                        <tr class="ocm-small"><td class="uk-text-right ocm-table"></td>
                            <td class="uk-text-center" colspan="<?php echo $noselected; ?>"><i class="uk-icon-chevron-down"></i> <?PHP _e('Maximum configuration'); ?></td>	
                        </tr>
                        <tr>
                        <td class="uk-text-right ocm-table">
                    <?php	if($lang == 'es') {
                    echo 'Configuración máxima';
                  } 
                  elseif($lang == 'pl') {
                    echo 'Maksymalna Konfiguracja';
                  }
                  else {
                    echo __('Maximum configuration');
                  } ?></td>
                        <?php echo implode("", $maxconf); ?>
                        </tr>
                        <tr class="ocm-small"><td class="uk-text-right ocm-table"></td>
                            <td class="uk-text-center" colspan="<?php echo $noselected; ?>"><i class="uk-icon-chevron-down"></i> <?PHP _e('Maximum Screen Size'); ?></td>	
                        </tr>
                        <tr>
                        <td class="uk-text-right ocm-table">
                    <?php	if($lang == 'es') {
                    echo 'Tamaño máximo de marco';
                  } 
                  elseif($lang == 'pl') {
                    echo 'Maksymalny Rozmiar Sita';
                  }
                  else {
                    echo __('Maximum Screen Size');
                  } ?></td>
                        <?php echo implode("", $maxscreen); ?>
                        </tr>
                        <tr class="ocm-small"><td class="uk-text-right ocm-table"></td>
                            <td class="uk-text-center" colspan="<?php echo $noselected; ?>"><i class="uk-icon-chevron-down"></i> <?PHP _e('Maximum Print Area'); ?></td>	
                        </tr>
                        <tr>
                        <td class="uk-text-right ocm-table">
                   <?php	if($lang == 'es') {
                    echo 'Área máxima de impresión';
                  } 
                  elseif($lang == 'pl') {
                    echo 'Maksymalny Obszar Druku';
                  }
                  else {
                    echo __('Maximum Print Area');
                  } ?></td>
                        <?php echo implode("", $maxprint); ?>
                        </tr>
                        <tr class="ocm-small"><td class="uk-text-right ocm-table"></td>
                            <td class="uk-text-center" colspan="<?php echo $noselected; ?>"><i class="uk-icon-chevron-down"></i> <?PHP _e('Flash'); ?></td>	
                        </tr>
                        <tr>
                        <td class="uk-text-right ocm-table">
                     <?php	if($lang == 'es') {
                    echo 'Pre secador';
                  } 
                  elseif($lang == 'pl') {
                    echo 'Suszarka Międzyoperacyjna';
                  }
                  else {
                    echo __('Flash');
                  } ?></td>
                        <?php echo implode("", $flash); ?>
                        </tr>
                        <tr class="ocm-small"><td class="uk-text-right ocm-table"></td>
                            <td class="uk-text-center" colspan="<?php echo $noselected; ?>"><i class="uk-icon-chevron-down"></i> <?PHP _e('Limited Warranty'); ?></td>	
                        </tr>
                        <tr>
                        <td class="uk-text-right ocm-table">
                     <?php	if($lang == 'es') {
                    echo 'De garantía';
                  } 
                  elseif($lang == 'pl') {
                    echo 'Gwarancji';
                  }
                  else {
                    echo __('Limited Warranty');
                  } ?></td>
                        <?php echo implode("", $warranty); ?>
                        </tr>
                        <tr class="ocm-small"><td class="uk-text-right ocm-table"></td>
                            <td class="uk-text-center" colspan="<?php echo $noselected; ?>"><i class="uk-icon-chevron-down"></i> <?PHP _e('Requires Compressor'); ?></td>	
                        </tr>
                        <tr>
                        <td class="uk-text-right ocm-table">
                         <?php	if($lang == 'es') {
                    echo 'Requiere compresor';
                  } 
                  elseif($lang == 'pl') {
                    echo 'Wymaga Sprężarki';
                  }
                  else {
                    echo __('Requires Compressor');
                  } ?></td>
                        <?php echo implode("", $compressor); ?>
                        </tr>
                        <tr>
                        <td class="uk-text-right ocm-table"></td>
                        <?php echo implode("", $link); ?>
                        </tr>
                
                    </tbody>
                </thead>
                </table>
        	</div>  
            <div class="compare_menu compare_menu_bottom">
                <div class="cm_row2"><div class="cm_row2_helper">
                    <a href="<?PHP echo $page_url; ?>" class="button gray_button"><?php _e('New compare'); ?></a>
                </div></div>
            </div>              
        </div> 
        <style type="text/css"> 
			.ocm-table {
			}
		
			#tm-main {
				padding: 0 !important;
				background: transparent !important;
			}
		
			#tm-main .uk-container-center {
				padding: 0 !important;
			}
		
			@media (max-width:768px) {
				.ocm-table {
					width: 30%;
					display: none;
				}
			}
			@media (min-width:769px) {
				.ocm-small {
					display: none !important;
				}
			}
			@media (max-width:550px) {
				.ocm-imgs {
					display:none !important;
				}
			}
		</style>       
        <?PHP
	} else {
		get_template_part('parts/compare_step_1');
	}
?>




