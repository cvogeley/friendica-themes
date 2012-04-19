<? session_start();
if ($_SESSION['Name']=="") session_destroy();
// session_destroy();
$Referer=explode("/N",$HTTP_REFERER);
?>

<html>

<head>
<title> Contentframe 2.2 (Eingeloggt: <? echo $_SESSION[Name];?>)</title>
<meta name="GENERATOR" content="Microsoft FrontPage 4.0">
<meta name="ProgId" content="FrontPage.Editor.Document">

</head>

<?

if ((!isset($_SESSION['Name']) || $_SESSION['Name'] == "") || $_SESSION['pgid']!="contentframe")
 print "Sie werden weitergeleitet...<meta http-equiv='refresh'content='1;URL=auswahl.php'>";

else {


echo <<<ABC
<html>
<frameset cols="20%,80%">
  <frame name="Links" src="folder.php" scrolling="auto">
  <frame name="Rechts" src="auswahl.php">
  <noframes>
  <body>
  <p>Diese Seite verwendet Frames. Frames werden von Ihrem Browser aber nicht
  unterstützt.</p>
  </body>
  </noframes>
</frameset>
</html>
ABC;  
ABC;

}
?>
</html>
