<?php
$tography_lite_theme_data = wp_get_theme();
return array(
	'theme_name' => $tography_lite_theme_data['Name'], 
	'theme_slug' => sanitize_title($tography_lite_theme_data['Name']),
	'theme_author' => $tography_lite_theme_data['Author'],
	'theme_author_uri' => $tography_lite_theme_data['AuthorURI'],
	'theme_version' => $tography_lite_theme_data['Version'],
	'required_wp_version' => '3.1'
);