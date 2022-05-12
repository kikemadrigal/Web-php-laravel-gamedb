<?php
//echo "<h2>fileGame".$idFileGame."game->".$idGame."</h2>";
$error=WebGameRepository::delete($idWebGame);
if (!$error) $mensaje="File insert.";
else $mensaje="Error inserting";
header('Location: '.PATHSERVER."game/update/".$idGame);
if ( PRODUCTION==1 ) echo "<script type='text/javascript'>location.href='".PATHSERVER."game/update/".$idGame."</script>";
            

?>