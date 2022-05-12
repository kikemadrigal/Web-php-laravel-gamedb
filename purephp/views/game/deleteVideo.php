<?php
//echo "<h2>VideoGame".$idVideoGame."game->".$idGame."</h2>";
$error=VideoGameRepository::delete($idVideoGame);
if (!$error) $mensaje="File insert.";
else $mensaje="Error inserting";
header('Location: '.PATHSERVER."game/update/".$idGame);
if ( PRODUCTION==1 ) echo "<script type='text/javascript'>location.href='".PATHSERVER."game/update/".$idGame."'</script>";
            

?>