<?php

/**
 * This file is a addon for BlogoText.
 *   http://lehollandaisvolant.net/blogotext/
 *   2016 Timo Van Neerden <timo@neerden.eu>
 * 
 * @author    RemRem <remrem@dirty-script.com>
 * @copyright Copyright (C) dirty-script.com,  All rights reserved.
 * @licence   MIT
 * @version   0.02.0000 alpha
 * 
 * You can redistribute it under the terms of the MIT / X11 Licence.
 */

/**
 * Pour que ce plugin fonctionne : 
 *  - remplacer {article_chapo} par {addon_chapo_img} dans vos templates
 */


$GLOBALS['addons'][] = array(
	'tag' => 'chapo_img',
	'name' => array(
		'en' => 'chapo_img',
		'fr' => 'chapo_img',
	),
	'desc' => array(
		'en' => 'Allows to display an image in the chapo using [img] or &lt;img /&gt;. Requires placing the tag in the template. See the website for more informations.',
		'fr' => 'Autorise l\'affichage d\'une image dans le chapo en utilisant [img] ou &lt;img /&gt;. Nécessite de placer la balise dans le template. Voir le site pour plus d\'informations.',
	),
	'url' => 'https://github.com/remrem/bogotext-chapo-img',
	'version' => '0.2.0',
);

/**
 * need a comment...
 */
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

	return markup_articles($content);
}
