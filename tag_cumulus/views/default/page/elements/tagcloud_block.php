<?php
/**
 * Display content-based tags
 *
 * Generally used in a sidebar. Does not work with groups currently.
 *
 * @uses $vars['subtypes']   Object subtype string or array of subtypes
 * @uses $vars['owner_guid'] The owner of the content being tagged
 * @uses $vars['limit']      The maxinum number of tags to display
 */
$context = elgg_get_context();
//$page_owner_guid = elgg_get_page_owner_guid();
$owner_guid = elgg_extract('owner_guid', $vars, ELGG_ENTITIES_ANY_VALUE);

if (!$owner_guid) {
	$owner_guid = ELGG_ENTITIES_ANY_VALUE;
}

$owner_entity = get_entity($owner_guid);

//$container_guid = $owner_entity->getContainerGUID();
if ($owner_entity && elgg_instanceof($owner_entity, 'group')) {
	// not supporting groups so return
	//$owner_is_group = 'true';	
	//return true;
	$owner_guid = ELGG_ENTITIES_ANY_VALUE;
}

$options = array(
	'type' => 'object',
	'subtype' => elgg_extract('subtypes', $vars, ELGG_ENTITIES_ANY_VALUE),
	'owner_guid' => $owner_guid,
//	'container_guid' => $container_guid,
	'threshold' => 0,
	'limit' => elgg_extract('limit', $vars, 50),
	'tag_name' => 'tags',
	'width' => $width,
);

$title = '';
if ($owner_guid != ''){
	//$user = get_user($owner_guid);
	$title .= $owner_entity->name . "'s ";	
}

$tag_types = array("blog", "videos", "bookmarks", "pages", "photos", "event", "file");
if (in_array($context, $tag_types)){
	switch ($context) {
    	case 'pages':
        	$title .= 'wiki page';
			$options['subtype'] = 'page_top';
        	break;
    	case 'videos':
        	$title .= 'video';
			$options['subtype'] = GLOBAL_IZAP_VIDEOS_SUBTYPE;
        	break;
		case 'photos':
			$title .= 'photo';
			$options['subtype'] = 'image';
			break;
    	case 'groups':
        	$title .= 'group';
        	break;
    	case 'file':
        	$title .= 'file';
        	break;
		case 'event_calendar':
			$title .= 'event';
			break;
    	case 'blog':
        	$title .= 'blog';
        	break;
		case 'bookmarks':
			$title .= 'bookmark';
			break;
	}
	$title .= " ";
	$title .= elgg_echo ('tag_cumulus:tags');
}
else {
	$title .= elgg_echo('tag_cumulus:default-tag-header');
}

//if (is_array($options['subtype']) && count($options['subtype']) > 1) {
	// we cannot provide links to tagged objects with multiple types
//elgg_dump($options);
$tag_data = elgg_get_tags($options);
//elgg_dump ($tag_data);

$cloud = elgg_view("output/tagcumulus",array('tagcloud' => $tag_data ,'object' => $options['type'], 'subtype' => $options['subtype'], 'width' => $width));

if (!$cloud) {
	return true;
}

if ($context != 'tags'){
// add a link to all site tags
$cloud .= '<p class="small">';
$cloud .= elgg_view_icon('tag');
$cloud .= elgg_view('output/url', array(
	'href' => 'tags',
	'text' => elgg_echo('tagcloud:allsitetags'),
	'is_trusted' => true,
));
$cloud .= '</p>';
}


echo elgg_view_module('aside', $title, $cloud);
