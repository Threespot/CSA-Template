<?php
/*
 * Simple Child Theme generated by Ultimatum Framework
*/

$theme = array(
	'theme_name' => 'csa',
	'theme_slug' => 'csa',
);
require_once( get_template_directory() . '/wonderfoundry/wonderworks.php' );

function addGlobalDep(){

	$abspath = get_stylesheet_directory();
	$relpath = get_stylesheet_directory_uri();

	$normalize = '/css/normalize.css';

	if (file_exists($abspath.$normalize)) {
		wp_enqueue_style('child-normalize-style', $relpath.$normalize);
	}

	$webflow = '/css/webflow.css';

	if (file_exists($abspath.$webflow)) {
		wp_enqueue_style('child-webflow-style', $relpath.$webflow);
	}
}

add_action ('wp_enqueue_scripts','addGlobalDep');




function addMasterDep(){

	$abspath = get_stylesheet_directory();
	$relpath = get_stylesheet_directory_uri();

	$masterstyle = '/css/master.css';

	if (file_exists($abspath.$masterstyle)) {
		wp_enqueue_style('child-master-style', $relpath.$masterstyle);
	}

	$masterscript = '/js/master.js';

	if (file_exists($abspath.$masterscript)) {
		//wp_enqueue_script('child-master-script', $relpath.$masterscript);
		wp_enqueue_script('child-master-script', $relpath.$masterscript, array('jquery'), '1.0.0', true);
	}
}

add_action ('wp_enqueue_scripts','addMasterDep');


add_filter('widget_text','execute_php',100);
function execute_php($html){
	if(strpos($html,"<"."?php")!==false){
		ob_start();
		eval("?".">".$html);
		$html=ob_get_contents();
		ob_end_clean();
	}
	return $html;
}

