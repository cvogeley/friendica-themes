<?php
/**
 * Theme settings
 */



function theme_content(&$a){
	if(!local_user())
		return;		
	
	$resize = get_pconfig(local_user(), 'duepuntozero', 'resize' );

       $font_size = get_pconfig(local_user(), 'duepuntozero', 'font_size' );
	$noscroll = get_pconfig(local_user(), 'duepuntozero', 'noscroll' );
 
	
	return duepuntozero_form($a,$font_size,$resize,$noscroll);
}

function theme_post(&$a){
	if(! local_user())
		return;
	
	if (isset($_POST['duepuntozero-settings-submit'])){
		set_pconfig(local_user(), 'duepuntozero', 'resize', $_POST['duepuntozero_resize']);	
		set_pconfig(local_user(), 'duepuntozero', 'noscroll', $_POST['duepuntozero_noscroll']);
		set_pconfig(local_user(), 'duepuntozero', 'font_size', $_POST['duepuntozero_font_size']);
	}
}


function theme_admin(&$a){
	$resize = get_config('duepuntozero', 'resize' );
	$noscroll = get_config('duepuntozero', 'noscroll' );
	$font_size = get_config('duepuntozero', 'font_size' );
	
	return duepuntozero_form($a,$font_size,$resize,$noscroll);
}

function theme_admin_post(&$a){
	if (isset($_POST['duepuntozero-settings-submit'])){
		set_config('duepuntozero', 'resize', $_POST['duepuntozero_resize']);
		set_config('duepuntozero', 'noscroll', $_POST['duepuntozero_noscroll']);
		set_config('duepuntozero', 'font_size', $_POST['duepuntozero_font_size']);
	}
}


function duepuntozero_form(&$a,$font_size,$resize,$noscroll){
	$noscrollopts = array(
	"0" => "0",
	"1" => "1",
       );
	$font_sizes = array(
		'12'=>'12',
		"---"=>"---",
		"16"=>"16",		
		"14"=>"14",
		'10'=>'10',
		);
	$resizes = array(
		"0"=>"0 (no resizing)",
		"600"=>"1 (600px)",
		"300"=>"2 (300px)",
		"250"=>"3 (250px)",
		"150"=>"4 (150px)",
	       );
	if ($_SESSION['theme'] == 'duepuntozero'){
	$t = file_get_contents( dirname(__file__). "/theme_settings.tpl" );
	$o .= replace_macros($t, array(
		'$submit' => t('Submit'),
		'$baseurl' => $a->get_baseurl(),
		'$title' => t("Theme settings"),
		'$resize' => array('duepuntozero_resize',t ('Set resize level for images in posts and comments (width and height)'),$resize,'',$resizes),
		'$font_size' => array('duepuntozero_font_size', t('Set font-size for posts and comments'), $font_size, '', $font_sizes),
		'$noscroll' => array('duepuntozero_noscroll', t('Avoid scrollbars in posts and allow larger posts? Yes=1 No=0'), $noscroll, '', $noscrollopts),
	));}
	return $o; 
}
