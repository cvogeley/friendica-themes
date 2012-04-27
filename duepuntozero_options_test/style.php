<?php
	$duepuntozero_font_size=false;
	$duepuntozero_noscroll=false;

	$site_duepuntozero_noscroll = get_config("duepuntozero", "noscroll" );
	$site_duepuntozero_font_size = get_config("duepuntozero", "font_size" );

	
	if (local_user()) {
		$duepuntozero_font_size = get_pconfig(local_user(), "duepuntozero", "font_size");
		$duepuntozero_noscroll = get_pconfig(local_user(), "duepuntozero", "noscroll");	
	}
	
	if ($duepuntozero_font_size===false) $duepuntozero_font_size=$site_duepuntozero_font_size;
	if ($duepuntozero_noscroll===false) $duepuntozero_noscroll=$site_duepuntozero_noscroll;
	if ($duepuntozero_noscroll===false) $duepuntozero_noscroll=0;
		
	if (file_exists("$THEMEPATH/style.css")){
		echo file_get_contents("$THEMEPATH/style.css");
	}

	if ($duepuntozero_noscroll =="1"){

		echo "
			.wall-item-content {
                      max-height: 20000px;
                      overflow: none;
                      }
		     ";
	}

	if($duepuntozero_font_size == "16"){
		echo "
			.wall-item-content-wrapper {
  					font-size: 16px;
  					}
  					
			.wall-item-content-wrapper.comment {
  					font-size: 16px;
  					}
		";  
       }
       if($duepuntozero_font_size == "14"){
		echo "
			.wall-item-content-wrapper {
  					font-size: 14px;
  					}
  					
			.wall-item-content-wrapper.comment {
  					font-size: 14px;
  					}
		";
	}	
	if($duepuntozero_font_size == "12"){
		echo "
			.wall-item-content-wrapper {
  					font-size: 12px;
  					}
  					
			.wall-item-content-wrapper.comment {
  					font-size: 12px;
  					}
		";
	}
	if($duepuntozero_font_size == "10"){
		echo "
			.wall-item-content-wrapper {
  					font-size: 10px;
  					}
  					
			.wall-item-content-wrapper.comment {
  					font-size: 10px;
  					}
		";
	}

