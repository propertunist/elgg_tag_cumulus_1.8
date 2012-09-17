<p>
<?php 
	$replace_widgets = $vars['entity']->replace_widgets;
	$replace_main = $vars['entity']->replace_main;
	$widget_width = $vars['entity']->widget_width;
	$default_width = $vars['entity']->default_width;
	$full_width = $vars['entity']->full_width;
	$speed = $vars['entity']->speed;
	$tcolor = $vars['entity']->tcolor;
	$tcolor2 = $vars['entity']->tcolor2;
	$tcolor_max = $vars['entity']->tcolor_max;
	$hi_color = $vars['entity']->hi_color;
	$hi_color_max = $vars['entity']->hi_color_max;
	$background_color = $vars['entity']->background_color;
	$wmode = $vars['entity']->wmode;
	$add_to_sidebar = $vars['entity']->add_to_sidebar;
	
	echo "<br/><h3>";
	echo elgg_echo('tag_cumulus:layout');
	echo "</h3><br/>";
	echo elgg_echo('tag_cumulus:replace_widgets');
	echo elgg_view('input/dropdown', array(
                        'name' => 'params[replace_widgets]',
                        'value' => $replace_widgets,
                        'options_values' => array(
                                'yes' => elgg_echo('option:yes'),
                                'no' => elgg_echo('option:no'),
                        ),
                ));
				
	echo "<br /><br/>";
	echo elgg_echo('tag_cumulus:replace_main');
	echo elgg_view('input/dropdown', array(
                        'name' => 'params[replace_main]',
                        'value' => $replace_main,
                        'options_values' => array(
                                'yes' => elgg_echo('option:yes'),
                                'no' => elgg_echo('option:no'),
                        ),
               ));
	echo "<br /><br/>";
	echo elgg_echo('tag_cumulus:add_to_sidebar');
	echo elgg_view('input/dropdown', array(
                        'name' => 'params[add_to_sidebar]',
                        'value' => $add_to_sidebar,
                        'options_values' => array(
                                'yes' => elgg_echo('option:yes'),
                                'no' => elgg_echo('option:no'),
                        ),
                ));				
	echo "<br/><br/><br/><h3>";
	echo elgg_echo ('tag_cumulus:widths');
	echo "</h3><br/>";	
	echo elgg_echo('tag_cumulus:default_width');
	echo elgg_view('input/text', array('name'=>'params[default_width]', 'value'=>$default_width));
	echo "<br /><br/>";
	echo elgg_echo('tag_cumulus:full_width');
	echo elgg_view('input/text', array('name'=>'params[full_width]', 'value'=>$full_width));
	echo "<br /><br/>";
	echo elgg_echo('tag_cumulus:widget_width');
	echo elgg_view('input/text', array('name'=>'params[widget_width]', 'value'=>$widget_width));
	echo "<br /><br/><hr><h3>";
	echo elgg_echo('tag_cumulus:colors');
	echo "</h3><br/><br/>";
	echo elgg_echo('tag_cumulus:background_color');
	echo elgg_view('input/text', array('name'=>'params[background_color]', 'value'=>$background_color));
	echo "<br /><br/>";
	echo elgg_echo('tag_cumulus:tcolor1');
	echo elgg_view('input/text', array('name'=>'params[tcolor]', 'value'=>$tcolor));
	echo "<br /><br/>";
	echo elgg_echo('tag_cumulus:tcolor2');
	echo elgg_view('input/text', array('name'=>'params[tcolor2]', 'value'=>$tcolor2));
	echo "<br /><br/>";
	echo elgg_echo('tag_cumulus:tcolor_max');
	echo elgg_view('input/text', array('name'=>'params[tcolor_max]', 'value'=>$tcolor_max));
	echo "<br/><br/>";
	echo elgg_echo('tag_cumulus:hi_color');
	echo elgg_view('input/text', array('name'=>'params[hi_color]', 'value'=>$hi_color));
	echo "<br/><br/>";
	echo elgg_echo('tag_cumulus:hi_max_color');
	echo elgg_view('input/text', array('name'=>'params[hi_color_max]', 'value'=>$hi_color_max));
	echo "<br/><br/><br/>";
	echo elgg_echo('tag_cumulus:wmode');
	echo elgg_view('input/dropdown', array(
                        'name' => 'params[wmode]',
                        'value' => $wmode,
                        'options_values' => array(
                                'transparent' => elgg_echo('transparent'),
                                'window' => elgg_echo('window'),
                                'direct' => elgg_echo('direct'),
                                'opaque' => elgg_echo('opaque'),
                        ),
                ));			
	echo "<br /><br/>";
	echo elgg_echo('tag_cumulus:speed');
	echo elgg_view('input/text', array('name'=>'params[speed]', 'value'=>$speed));
?>	
</p>