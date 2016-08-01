<?php
/**
 * This file is a addon for BlogoText.
 *   http://lehollandaisvolant.net/blogotext/
 *   2016 Timo Van Neerden <timo@neerden.eu>
 * 
 * @author    RemRem <remrem@dirty-script.com>
 * @copyright Copyright (C) dirty-script.com,  All rights reserved.
 * @licence   MIT
 * @version   0.00.0001 alpha
 * 
 * You can redistribute it under the terms of the MIT / X11 Licence.
 */

/**
 * Pour que ce plugin fonctionne : 
 *  - remplacer {article_chapo} par {addon_chapo_img} dans vos templates
 *  - modifier le coeur tel que : https://github.com/timovn/blogotext/pull/72
 */

// include this addon
$GLOBALS['addons'][] = array('tag' => '{addon_chapo_img}', 'callback_function' => 'addon_chapo_img');



// returns HTML <table> calender
function addon_chapo_img(){
	global $addon_chapo_img_ct;
	if (is_null( $addon_chapo_img_ct )){ $addon_chapo_img_ct = 0; } else { ++$addon_chapo_img_ct; }

	$content = '';

	if (isset($GLOBALS['tableau'])
	 && isset($GLOBALS['tableau'][$addon_chapo_img_ct])
	 && isset( $GLOBALS['tableau'][$addon_chapo_img_ct]['bt_abstract'] )
	 && !empty( $GLOBALS['tableau'][$addon_chapo_img_ct]['bt_abstract'] )
	){
		$content = $GLOBALS['tableau'][$addon_chapo_img_ct]['bt_abstract'];
	}

	if (isset($GLOBALS['billets'])
	 && isset($GLOBALS['billets'][$addon_chapo_img_ct])
	 && isset( $GLOBALS['billets'][$addon_chapo_img_ct]['bt_abstract'] )
	 && !empty( $GLOBALS['billets'][$addon_chapo_img_ct]['bt_abstract'] )
	){
		$content = $GLOBALS['billets'][$addon_chapo_img_ct]['bt_abstract'];
	}

	if (empty($content)){
		return '';
	}

	if (strpos($content,'[img]') === false
	 && strpos($content,'<img') === false
	){
		return $content;
	}

	return formatage_wiki($content);
}



