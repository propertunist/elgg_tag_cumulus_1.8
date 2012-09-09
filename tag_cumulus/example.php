<?php
	require_once(dirname(dirname(dirname(__FILE__))) . "/engine/start.php");

	global $CONFIG;
	elgg_set_context('tag_cumulus');
	$context = elgg_get_context();
	
	$title = elgg_echo("Example");
	
	$body = elgg_view_title($title);
	/* $body .= '<br/>context = ' . $context . '</br>'; */
	$body .= '<div id="tag_cumulus_container" class="elgg-module elgg-module-aside" style="width:200px;">';
//	$body .= '<div class="elgg-head">';
//	$body .= elgg_view_title('Tags');
//	$body .= '</div><div class="elgg-body">';
   	$body .= display_tag_cumulus(0,50,'tags','object','','','','',$context,'');
  // 	$body .= '</div></div>';
  	$body .= '</div>';
    
    $body = elgg_view_layout('one_column', $body);
	
	// Finally draw the page
	page_draw($title, $body);
?>