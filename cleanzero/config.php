<?php
/**
 * Theme settings
 */



function theme_content(&$a){
	if(!local_user())
		return;		
	
	
	$color = get_pconfig(local_user(), 'cleanzero', 'color' );
       $font_size = get_pconfig(local_user(), 'cleanzero', 'font_size' );
	
	return cleanzero_form($a,$color,$font_size);
}

function theme_post(&$a){
	if(! local_user())
		return;
	
	if (isset($_POST['cleanzero-settings-submit'])){
		
		set_pconfig(local_user(), 'cleanzero', 'color', $_POST['cleanzero_color']);
		set_pconfig(local_user(), 'cleanzero', 'font_size', $_POST['cleanzero_font_size']);
	}
}


function theme_admin(&$a){
	
	$color = get_config('cleanzero', 'color' );
	$font_size = get_config('cleanzero', 'font_size' );
	
	return cleanzero_form($a,$color,$font_size);
}

function theme_admin_post(&$a){
	if (isset($_POST['cleanzero-settings-submit'])){
		
		set_config('cleanzero', 'color', $_POST['cleanzero_color']);
		set_config('cleanzero', 'font_size', $_POST['cleanzero_font_size']);
	}
}


function cleanzero_form(&$a, $color,$font_size){
	$colors = array(
		"cleanzero"=>"cleanzero", 
		"cleanzero-green"=>"green",
		"cleanzero-purple"=>"purple"
	);
	$font_sizes = array(
		'12'=>'12',
		"---"=>"---",
		"16"=>"16",		
		"14"=>"14",
		'10'=>'10',
		);
	
	$t = file_get_contents( dirname(__file__). "/theme_settings.tpl" );
	$o .= replace_macros($t, array(
		'$submit' => t('Submit'),
		'$baseurl' => $a->get_baseurl(),
		'$title' => t("Theme settings"),
		'$font_size' => array('cleanzero_font_size', t('Set font-size for posts and comments'), $font_size, '', $font_sizes),
		'$color' => array('cleanzero_color', t('Color scheme'), $color, '', $colors),
	));
	return $o;
}
