<?php

$webGame=new WebGame(0);
$webGame->setText($text);
$webGame->setGame($idGame);
$error=WebGameRepository::insert($webGame);
if (!$error) $mensaje="Web ".$webGame->getText()." insert.";
else $mensaje="Error inserting";

header('Location: '.PATHSERVER."game/update/".$idGame);
if ( PRODUCTION==1 ) echo "<script type='text/javascript'>location.href='".PATHSERVER."game/update/".$idGame."'</script>";


?>