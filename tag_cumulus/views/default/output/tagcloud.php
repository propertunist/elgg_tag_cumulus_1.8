<?php
/**
 * Elgg tagcloud
 * Displays a tagcloud
 *
 * @package Elgg
 * @subpackage Core
 *
 * @uses $vars['tagcloud'] An array of stdClass objects with two elements: 'tag' (the text of the tag) and 'total' (the number of elements with this tag)
 * @uses $vars['value'] Sames as tagcloud
 * @uses $vars['type'] Entity type
 * @uses $vars['subtype'] Entity subtype
 */

$context = elgg_get_context();

if (!empty($vars['subtype'])) {
	$subtype = "&entity_subtype=" . urlencode($vars['subtype']);
} else {
	$subtype = "";
}
if (!empty($vars['type'])) {
	$type = "&entity_type=" . urlencode($vars['type']);
} else {
	$type = "";
}

if (empty($vars['tagcloud']) && !empty($vars['value'])) {
	$vars['tagcloud'] = $vars['value'];
}

if (!empty($vars['tagcloud']) && is_array($vars['tagcloud'])) {
	if ((elgg_get_plugin_setting('replace_widgets', 'tag_cumulus') == 'yes') && ($context == 'widgets')){
		$use_cumulus = 'yes';
		$width = elgg_get_plugin_setting('widget_width', 'tag_cumulus');
	}
	if ((elgg_get_plugin_setting('replace_main', 'tag_cumulus') == 'yes') && ($context == 'tags')){
		$use_cumulus = 'yes';
		$width = elgg_get_plugin_setting('full_width', 'tag_cumulus');
	}
	if ($use_cumulus == 'yes'){
  		$cloud = elgg_view("output/tagcumulus",array('tagcloud' => $vars['tagcloud'] ,'object' => $type, 'subtype' => $subtype, 'width' => $width));
	}
	else {
	
	$counter = 0;
	$max = 0;
	
	foreach ($vars['tagcloud'] as $tag) {
		if ($tag->total > $max) {
			$max = $tag->total;
		}
	}
	
	$cloud = '';
	foreach ($vars['tagcloud'] as $tag) {
		if ($cloud != '') {
			$cloud .= ', ';
		}
		// protecting against division by zero warnings
		$size = round((log($tag->total) / log($max + .0001)) * 100) + 30;
		if ($size < 100) {
			$size = 100;
		}
		$url = "search?q=". urlencode($tag->tag) . "&search_type=tags$type$subtype";

		$cloud .= elgg_view('output/url', array(
			'text' => $tag->tag,
			'href' => $url,
			'style' => "font-size: $size%;",
			'title' => "$tag->tag ($tag->total)",
			'rel' => 'tag'
		));
	}
	
	$cloud .= elgg_view('tagcloud/extend');
	}
	echo "<div class=\"elgg-tagcloud\">$cloud</div>"; 
}
