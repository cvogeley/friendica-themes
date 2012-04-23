<?php
$a->theme_info = array(
  'extends' => 'duepuntozero',
);
function cleanzero_init(&$a) {
$a->page['htmlhead'] .= <<< EOT
<script>
$(document).ready(function() {

$('.group-edit-icon').hover(
	function() {
		$(this).addClass('icon'); $(this).removeClass('iconspacer');},
	function() {
		$(this).removeClass('icon'); $(this).addClass('iconspacer');}
	);

$('.sidebar-group-element').hover(
	function() {
		id = $(this).attr('id');
		$('#edit-' + id).addClass('icon'); $('#edit-' + id).removeClass('iconspacer');},

	function() {
		id = $(this).attr('id');
		$('#edit-' + id).removeClass('icon');$('#edit-' + id).addClass('iconspacer');}
	);


$('.savedsearchdrop').hover(
	function() {
		$(this).addClass('drop'); $(this).addClass('icon'); $(this).removeClass('iconspacer');},
	function() {
		$(this).removeClass('drop'); $(this).removeClass('icon'); $(this).addClass('iconspacer');}
	);

$('.savedsearchterm').hover(
	function() {
		id = $(this).attr('id');
		$('#drop-' + id).addClass('icon'); 	$('#drop-' + id).addClass('drophide'); $('#drop-' + id).removeClass('iconspacer');},

	function() {
		id = $(this).attr('id');
		$('#drop-' + id).removeClass('icon');$('#drop-' + id).removeClass('drophide'); $('#drop-' + id).addClass('iconspacer');}
	);

});


</script>
EOT;
//load jquery.ae.image.resize.js
$imageresizeJS = $a->get_baseurl($ssl_state)."/view/theme/cleanzero/js/jquery.ae.image.resize.js";
$a->page['htmlhead'] .= sprintf('<script language="JavaScript" src="%s" ></script>', $imageresizeJS);
$a->page['htmlhead'] .= '
<script>

 $(function() {
	$(".wall-item-content-wrapper  img").aeImageResize({height: 250, width: 250});
  });
</script>';
}
