<?php
//register & enqueue styles & scripts
add_action('wp_enqueue_scripts', 'enqueue');
function enqueue(){
	wp_deregister_script('jquery');
	wp_register_script('jquery', 'https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js');

	//Bootstrap
	wp_register_script('bootstrap', 'https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js', NULL, '3.3.4');

	//jQuery UI
	wp_register_script('jquery-ui', '//code.jquery.com/ui/1.11.4/jquery-ui.js');

	//Google Map
	wp_register_script('google-map', 'https://maps.googleapis.com/maps/api/js?v=3.exp&sensor=false');
	wp_register_script('acf-map', get_stylesheet_directory_uri().'/js/acf-map.js');

//enqueue scripts
	wp_enqueue_script(array('jquery','bootstrap'));

	//styles
	//Bootstrap Core CSS
	wp_register_style('bootstrap', 'https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css', NULL, '3.3.4');

	//Theme stylesheet
	wp_register_style('styles', get_stylesheet_directory_uri().'/style.css', NULL, NULL);

//enqueue styles
	wp_enqueue_style(array('bootstrap','styles'));

	//run Google Map scripts only on its page template
	if ( is_page_template('page-templates/google-map.php') ){
		wp_enqueue_script(array('google-map','acf-map'));
	}
}