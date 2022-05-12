<?php
$videoGame=new VideoGame(0);
$videoGame->setText($text);
$videoGame->setGame($idGame);
//echo "<h1>".$text.", ".$idGame."</h1>";
//echo "<h1>".$videoGame->getText().", ".$videoGame->getGame()."</h1>";
$error=VideoGameRepository::insert($videoGame);
if (!$error) $mensaje="Video ".$videoGame->getText()." insert.";
else $mensaje="Error inserting";
header('Location: '.PATHSERVER."game/update/".$idGame);
if ( PRODUCTION==1 ) echo "<script type='text/javascript'>location.href='".PATHSERVER."game/update/".$idGame."'</script>";


?>