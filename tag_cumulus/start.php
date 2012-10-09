<?php

	/**
	 * Tag Cumulus
	 * 
	 * @package tag_cumulus
	 * @license http://www.gnu.org/licenses/old-licenses/gpl-2.0.html GNU Public License version 2
	 * @author Pedro Prez
	 * @copyright 2009
	 * @link http://www.pedroprez.com.ar/
 	*/

	//require_once(dirname(__FILE__) . '/model/tag_cumulus.php');
	
	//Default Settings
		define('TAG_CUMULUS_WIDTH','200');
		define('TAG_CUMULUS_HEIGHT','200');
 		define('TAG_CUMULUS_SPEED','200');
 	/*
 	 If you want to change the color to red you must put 0xFF0000 this is put 0x instead of #.
	 Other examples:
		Blue: 0x0000FF 
		Green: 0x00FF00
		Yellow: 0xFFFF00
	*/ 
 		define('TAG_CUMULUS_COLOR_MAX','0x444444');
 		define('TAG_CUMULUS_HI_COLOR_MAX','0x000000');
 		define('TAG_CUMULUS_T_COLOR','0x555555');
 		define('TAG_CUMULUS_T_COLOR2','0x999999');
 		define('TAG_CUMULUS_HI_COLOR','0x222222');
 		define('TAG_CUMULUS_WMODE','transparent');
 	//This color must be hexadecimal code
 		define('TAG_CUMULUS_BACKGROUND','#ffffff');
 		
 	
 	function tag_cumulus_init(){
		elgg_extend_view('page/elements/head','tag_cumulus/javascript');
		
		if (get_plugin_setting('add_to_sidebar', 'tag_cumulus') == 'yes') {
			$display_tags_here = array("videos", "photos", "events");
			$context = elgg_get_context();
			if (in_array($context, $display_tags_here)){
				elgg_extend_view('page/elements/sidebar','page/elements/tagcloud_block');
			} 
		}
	}
	
	//**BEGIN
	elgg_register_event_handler('init','system','tag_cumulus_init');
?>
