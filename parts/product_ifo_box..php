<?PHP

$lang = ICL_LANGUAGE_CODE;
$controlpanel  = get_field('wpcf-toll-lessadjustment');
if(!empty($controlpanel)) {
	$controlpanel = explode('; ', $controlpanel);
	?>
    <div class="col-md-6">
    	<div class="pib_title">
        <?php
			if($lang == 'es') {
				echo 'Panel de Control';
			} elseif($lang == 'pl') {
				echo 'Panel kontrolny';
			} elseif($lang == 'fr') {
				echo 'Réglage sans outil';
			} elseif($lang == 'ru') {
				echo 'Обслуживание';
			} else {
				echo 'Tool-less Adjustment';
			}
		?>
        </div>
        <ul>
        	<li><?PHP echo implode('</li><li>', $controlpanel); ?></li>
        </ul>
    </div>
    <?PHP
}
$controlpanel  = get_field('wpcf-controls');
if(!empty($controlpanel)) {
	$controlpanel = explode('; ', $controlpanel);
	?>
    <div class="col-md-6">
    	<div class="pib_title">
        <?php
			if($lang == 'es') {
				echo 'Panel de Control';
			} elseif($lang == 'pl') {
				echo 'Panel kontrolny';
			} elseif($lang == 'fr') {
				echo 'Contrôles';
			} elseif($lang == 'ru') {
				echo 'Панель управления';
			} else {
				echo 'Controls';
			}
		?>
        </div>
        <ul>
        	<li><?PHP echo implode('</li><li>', $controlpanel); ?></li>
        </ul>
    </div>
    <?PHP
}
$touchscreenopt  = get_field('wpcf-touchscreenopt');
if(!empty($touchscreenopt)) {
	$touchscreenopt = explode('; ', $touchscreenopt);
	?>
    <div class="col-md-6">
    	<div class="pib_title">
        <?php

			if($lang == 'es') {
				echo 'Controles de pantalla táctil';
			} elseif($lang == 'pl') {
				echo 'Monitor dotykowy sterowanie';
			} elseif($lang == 'fr') {
				echo 'Contrôles d’écran tactile';
			} elseif($lang == 'ru') {
				echo 'Сенсорный экран управления';
			} else {
				echo 'Touchscreen Controls';
			}
		?>
        </div>
        <ul>
        	<li><?PHP echo implode('</li><li>', $touchscreenopt); ?></li>
        </ul>
    </div>
    <?PHP
}

$controlpanel  = get_field('wpcf-controlpanel');
if(!empty($controlpanel)) {
	$controlpanel = explode('; ', $controlpanel);
	?>
    <div class="col-md-6">
    	<div class="pib_title">
        <?php
			if($lang == 'es') {
				echo 'Panel de Control';
			} elseif($lang == 'pl') {
				echo 'Panel kontrolny';
			} elseif($lang == 'fr') {
				echo 'Panneau de contrôle';
			} elseif($lang == 'ru') {
				echo 'Панель управления';
			} else {
				echo 'Control Panel';
			}
		?>
        </div>
        <ul>
        	<li><?PHP echo implode('</li><li>', $controlpanel); ?></li>
        </ul>
    </div>
    <?PHP
}

$styles  = get_field('wpcf-styles');
if(!empty($styles)) {
	$styles = explode('; ', $styles);
	?>
    <div class="col-md-6">
    	<div class="pib_title">
        <?php
			if($lang == 'es') {
				echo 'Estilos';
			} elseif($lang == 'pl') {
				echo 'Style';
			} elseif($lang == 'ru') {
				echo 'Стиль';
			} else {
				echo 'Style';
			}
		?>
        </div>
        <ul>
        	<li><?PHP echo implode('</li><li>', $styles); ?></li>
        </ul>
    </div>
    <?PHP
}


$heatingelements  = get_field('wpcf-heatingelements');
if(!empty($heatingelements)) {
	$heatingelements = explode('; ', $heatingelements);
	?>
    <div class="col-md-6">
    	<div class="pib_title">
        <?php
			if($lang == 'es') {
				echo 'Elementos de Calentamiento';
			} elseif($lang == 'pl') {
				echo 'Elementy grzewcze';
			} elseif($lang == 'fr') {
				echo 'Éléments chauffants';
			} elseif($lang == 'ru') {
				echo 'Нагревательные элементы';
			} else {
				echo 'Heating System';
			}
		?>
        </div>
        <ul>
        	<li><?PHP echo implode('</li><li>', $heatingelements); ?></li>
        </ul>
    </div>
    <?PHP
}

$lightsource  = get_field('wpcf-lightsource');
if(!empty($lightsource)) {
	$lightsource = explode('; ', $lightsource);
	?>
    <div class="col-md-6">
    	<div class="pib_title">
        <?php
			if($lang == 'es') {
				echo 'Fuente de luz';
			} elseif($lang == 'pl') {
				echo 'Źródło światła';
			} elseif($lang == 'fr') {
				echo 'Source de lumière';
			} elseif($lang == 'ru') {
				echo 'Источник света';
			} else {
				echo 'Light Source';
			}
		?>
        </div>
        <ul>
        	<li><?PHP echo implode('</li><li>', $lightsource); ?></li>
        </ul>
    </div>
    <?PHP
}

$curesource  = get_field('wpcf-curesource');
if(!empty($curesource)) {
	$curesource = explode('; ', $curesource);
	?>
    <div class="col-md-6">
    	<div class="pib_title">
        <?php
			if($lang == 'es') {
				echo 'Cure Source';
			} elseif($lang == 'pl') {
				echo 'Cure Source';
			} elseif($lang == 'fr') {
				echo 'Système de chauffage';
			} elseif($lang == 'ru') {
				echo 'Нагревательные элементы';
			} else {
				echo 'Heating System';
			}
		?>
        </div>
        <ul>
        	<li><?PHP echo implode('</li><li>', $curesource); ?></li>
        </ul>
    </div>
    <?PHP
}

$operation  = get_field('wpcf-operation');
if(!empty($operation)) {
	$operation = explode('; ', $operation);
	?>
    <div class="col-md-6">
    	<div class="pib_title">
        <?php
			if($lang == 'es') {
				echo 'Operación';
			} elseif($lang == 'pl') {
				echo 'Działanie';
			} elseif($lang == 'ru') {
				echo 'Операция';
			} else {
				echo 'Operation';
			}
		?>
        </div>
        <ul>
        	<li><?PHP echo implode('</li><li>', $operation); ?></li>
        </ul>
    </div>
    <?PHP
}

$cleaning  = get_field('wpcf-cleaning');
if(!empty($cleaning)) {
	$cleaning = explode('; ', $cleaning);
	?>
    <div class="col-md-6">
    	<div class="pib_title">
        <?php
			if($lang == 'es') {
				echo 'Limpieza';
			} elseif($lang == 'pl') {
				echo 'Czyszczenie';
			} elseif($lang == 'ru') {
				echo 'Очистка';
			} else {
				echo 'Cleaning';
			}
		?>
        </div>
        <ul>
        	<li><?PHP echo implode('</li><li>', $cleaning); ?></li>
        </ul>
    </div>
    <?PHP
}

$exposurearea  = get_field('wpcf-exposurearea');
if(!empty($exposurearea)) {
	$exposurearea = explode('; ', $exposurearea);
	?>
    <div class="col-md-6">
    	<div class="pib_title">
        <?php
			if($lang == 'es') {
				echo 'Area de Exposición';
			} elseif($lang == 'pl') {
				echo 'Obszar naświetlania';
			} elseif($lang == 'ru') {
				echo 'Область экспозиции';
			} else {
				echo 'Exposure Area';
			}
		?>
        </div>
        <ul>
        	<li><?PHP echo implode('</li><li>', $exposurearea); ?></li>
        </ul>
    </div>
    <?PHP
}

$blanketandvacuum  = get_field('wpcf-blanketandvacuum');
if(!empty($blanketandvacuum)) {
	$blanketandvacuum = explode('; ', $blanketandvacuum);
	?>
    <div class="col-md-6">
    	<div class="pib_title">
        <?php
			if($lang == 'es') {
				echo 'Cubierta y Vacío';
			} elseif($lang == 'pl') {
				echo 'Materiał i system vacuum';
			} elseif($lang == 'ru') {
				echo 'Покрытие и вакуум';
			} else {
				echo 'Blanket and Vacuum';
			}
		?>
        </div>
        <ul>
        	<li><?PHP echo implode('</li><li>', $blanketandvacuum); ?></li>
        </ul>
    </div>
    <?PHP
}

$printheadsopt  = get_field('wpcf-printheadsopt');
if(!empty($printheadsopt)) {
	$printheadsopt = explode('; ', $printheadsopt);
	?>
    <div class="col-md-6">
    	<div class="pib_title">
        <?php
			if($lang == 'es') {
				echo 'Cabezas de Impresión';

			} elseif($lang == 'pl') {
				echo 'Głowice drukujące';
			} elseif($lang == 'fr') {
				echo 'Têtes d&#39;impression';
			} elseif($lang == 'ru') {
				echo 'Печатающие головки';
			} else {
				echo 'Print Heads';
			}
		?>
        </div>
        <ul>
        	<li><?PHP echo implode('</li><li>', $printheadsopt); ?></li>
        </ul>
    </div>
    <?PHP
}

$squeegeeandfloodbar  = get_field('wpcf-squeegeeandfloodbar');
if(!empty($squeegeeandfloodbar)) {
	$squeegeeandfloodbar = explode('; ', $squeegeeandfloodbar);
	?>
    <div class="col-md-6">
    	<div class="pib_title">
        <?php
			if($lang == 'es') {
				echo 'Squeegee y FloodBar';
			} elseif($lang == 'pl') {
				echo 'Rakle i prrzedrakle';
			} elseif($lang == 'fr') {
				echo 'Raclettes et Flood Barres';
			} elseif($lang == 'ru') {
				echo 'Скребок и сливной бар';
			} else {
				echo 'Squeegee and Flood Bar';
			}
		?>
        </div>
        <ul>
        	<li><?PHP echo implode('</li><li>', $squeegeeandfloodbar); ?></li>
        </ul>
    </div>
    <?PHP
}

$toollessadjustment  = get_field('wpcf-tool-lessadjustment');
if(!empty($toollessadjustment)) {
	$toollessadjustment = explode('; ', $toollessadjustment);
	?>
    <div class="col-md-6">
    	<div class="pib_title">
        <?php
			if($lang == 'es-ES') {
				echo 'Ajuste sin herramientas';
			} elseif($lang == 'pl-PL') {
				echo 'Beznarzędziowa Regulacja';
			} elseif($lang == 'fr') {
				echo 'Réglage sans outil';
			} elseif($lang == 'ru') {
				echo 'Регулировка без инструментов';
			} else {
				echo 'Tool-less Adjustment';
			}
		?>
        </div>
        <ul>
        	<li><?PHP echo implode('</li><li>', $toollessadjustment); ?></li>
        </ul>
    </div>
    <?PHP
}

$peelsystem  = get_field('wpcf-peelsystem');
if(!empty($peelsystem)) {
	$peelsystem = explode('; ', $peelsystem);
	?>
    <div class="col-md-6">
    	<div class="pib_title">
        <?php
			if($lang == 'es') {
				echo 'Sistema de levantado';
			} elseif($lang == 'pl') {
				echo 'System czyszczenia';
			} elseif($lang == 'fr') {
				echo 'Système de pelage';
			} elseif($lang == 'ru') {
				echo 'Система очистки';
			} else {
				echo 'Peel System';
			}
		?>
        </div>
        <ul>
        	<li><?PHP echo implode('</li><li>', $peelsystem); ?></li>
        </ul>
    </div>
    <?PHP
}

$pallet  = get_field('wpcf-pallet');
if(!empty($pallet)) {
	$pallet = explode('; ', $pallet);
	?>
    <div class="col-md-6">
    	<div class="pib_title">
        <?php
			if($lang == 'es') {
				echo 'Paletas';
			} elseif($lang == 'pl') {
				echo 'Palety';
			} elseif($lang == 'fr') {
				echo 'Palettes';
			} elseif($lang == 'ru') {
				echo 'Палеты';
			} else {
				echo 'Pallets';
			}
		?>
        </div>
        <ul>
        	<li><?PHP echo implode('</li><li>', $pallet); ?></li>
        </ul>
    </div>
    <?PHP
}

$servoindexer  = get_field('wpcf-servo-indexer');
if(!empty($servoindexer)) {
	$servoindexer = explode('; ', $servoindexer);
	?>
    <div class="col-md-6">
    	<div class="pib_title">
        <?php
			if($lang == 'es') {
				echo 'Servo indexer';
			} elseif($lang == 'pl') {
				echo 'Indeksowanie serwo';
			} elseif($lang == 'fr') {
				echo 'Servo-Indexer';
			} elseif($lang == 'ru') {
				echo 'Servo-Indexer';
			} else {
				echo 'Servo-Indexer';
			}
		?>
        </div>
        <ul>
        	<li><?PHP echo implode('</li><li>', $servoindexer); ?></li>
        </ul>
    </div>
    <?PHP
}

$construction  = get_field('wpcf-construction');
if(!empty($construction)) {
	$construction = explode('; ', $construction);
	?>
    <div class="col-md-6">
    	<div class="pib_title">
        <?php
			if($lang == 'es') {
				echo 'Construcción';
			} elseif($lang == 'pl') {
				echo 'Budowa';
		    } elseif($lang == 'fr') {
				echo 'Construction';
			} elseif($lang == 'ru') {
				echo 'Строение';
			} else {
				echo 'Construction';
			}
		?>
        </div>
        <ul>
        	<li><?PHP echo implode('</li><li>', $construction); ?></li>
        </ul>
    </div>
    <?PHP
}

$belt  = get_field('wpcf-belt');
if(!empty($belt)) {
	$belt = explode('; ', $belt);
	?>
    <div class="col-md-6">
    	<div class="pib_title">
        <?php
			if($lang == 'es') {
				echo 'Banda';
			} elseif($lang == 'pl') {
				echo 'Pas transmisyjny';
			} elseif($lang == 'fr') {
				echo 'Courroie de transmission';
			} elseif($lang == 'ru') {
				echo 'Ремень трансмиссии';
			} else {
				echo 'Belt';
			}

		?>
        </div>
        <ul>
        	<li><?PHP echo implode('</li><li>', $belt); ?></li>
        </ul>
    </div>
    <?PHP
}

$registration  = get_field('wpcf-registration');
if(!empty($registration)) {
	$registration = explode('; ', $registration);
	?>
    <div class="col-md-6">
    	<div class="pib_title">
        <?php
			if($lang == 'es') {
				echo 'Registro';
			} elseif($lang == 'pl') {
				echo 'Regulacja';
			} elseif($lang == 'fr') {
				echo 'Enregistrement';
			} elseif($lang == 'ru') {
				echo 'Registration';
			} else {
				echo 'Registration';
			}
		?>
        </div>
        <ul>
        	<li><?PHP echo implode('</li><li>', $registration); ?></li>
        </ul>
    </div>
    <?PHP
}

$skipshirtsmashbutton  = get_field('wpcf-skipshirtsmashbutton');
if(!empty($skipshirtsmashbutton)) {
	$skipshirtsmashbutton = explode('; ', $skipshirtsmashbutton);
	?>
    <div class="col-md-6">
    	<div class="pib_title">
        <?php
			if($lang == 'es') {
				echo 'Salto de camisa con botón de presiön';
			} elseif($lang == 'pl') {
				echo 'Skip Shirt & Smash Button';
			} elseif($lang == 'fr') {
				echo 'Skip Shirt & Smash Button';
			} elseif($lang == 'ru') {
				echo 'Skip Shirt & Smash Button';
			} else {
				echo 'Skip Shirt & Smash Button';
			}
		?>
        </div>
        <ul>
        	<li><?PHP echo implode('</li><li>', $skipshirtsmashbutton); ?></li>
        </ul>
    </div>
    <?PHP
}

$centraloffcontact  = get_field('wpcf-centraloffcontact');
if(!empty($centraloffcontact)) {
	$centraloffcontact = explode('; ', $centraloffcontact);
	?>
    <div class="col-md-6">
    	<div class="pib_title">
        <?php
			if($lang == 'es') {
				echo 'Fuera de Contacto Central';
			} elseif($lang == 'pl') {
				echo 'Centralny Off-Contact';
			} elseif($lang == 'fr') {
				echo 'Centralny Off-Contact';
			} elseif($lang == 'ru') {
				echo 'Centralny Off-Contact';
			} else {
				echo 'Central Off-Contact';
			}
		?>
        </div>
        <ul>
        	<li><?PHP echo implode('</li><li>', $centraloffcontact); ?></li>
        </ul>
    </div>
    <?PHP
}

$safetysystems  = get_field('wpcf-safetysystems');
if(!empty($safetysystems)) {
	$safetysystems = explode('; ', $safetysystems);
	?>
    <div class="col-md-6">
    	<div class="pib_title">
        <?php
			if($lang == 'es') {
				echo 'Sistemas de Seguridad';
			} elseif($lang == 'pl') {
				echo 'Systemy bezpieczeństwa';
			} elseif($lang == 'fr') {
				echo 'Systèmes de sécurité';
			} elseif($lang == 'ru') {
				echo 'Системы безопасности';
			} else {
				echo 'Safety Systems';
			}
		?>
        </div>
        <ul>
        	<li><?PHP echo implode('</li><li>', $safetysystems); ?></li>
        </ul>
    </div>
    <?PHP
}

$gvopt  = get_field('wpcf-options');
if(!empty($gvopt)) {
	$gvopt = explode('; ', $gvopt);
	?>
    <div class="col-md-6">
    	<div class="pib_title">
        <?php 						
			if($lang == 'es') {
				echo 'Opciones';
			} elseif($lang == 'pl') {
				echo 'Opcje';
			} elseif($lang == 'fr') {
				echo 'Les options';
			} elseif($lang == 'ru') {
				echo 'Опции';
			} else {
				echo 'Options';
			}
		?>
        </div>
        <ul>
        	<li><?PHP echo implode('</li><li>', $gvopt); ?></li>
        </ul>
    </div>
    <?PHP
}

$cutom_information_blocks  = get_field('cutom_information_blocks');
?>



<?php if( have_rows('cutom_information_blocks') ): ?>
				
				<?php while( have_rows('cutom_information_blocks') ): the_row(); 
									$block_name = get_sub_field('block_name'); 
									$information_label = get_sub_field('information_label');
									?>
									
									
									
									
									    <?PHP
if(!empty($information_label)) {
	$information_label = explode('; ', $information_label);
	?>
    <div class="col-md-6">
    	<div class="pib_title">
		<?php echo $block_name; ?>
        </div>
        <ul>
        	<li><?PHP echo implode('</li><li>', $information_label); ?></li>
        </ul>
    </div>
    <?PHP
}
?>
									
								
				<?php endwhile; ?>
			<?php endif;
			

