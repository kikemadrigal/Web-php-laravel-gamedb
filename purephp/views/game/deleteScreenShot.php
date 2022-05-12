<?php
$error="";
//echo "<h2>idScreenShotGame: ".$idScreenShotGame.", idgame->".$idGame."</h2><br>";

// Use unlink() function to delete a file
//1 Obtenemos el path 
//$path="./";
$path =ScreenShotGameRepository::getPath($idScreenShotGame);
//echo "<h1>PAT------>".$path."</h1>";
if (!unlink($path)) {
    echo ("$path cannot be deleted due to an error");
}
else {
    echo ("$path has been deleted");
}
$error=ScreenShotGameRepository::delete($idScreenShotGame);
if (!$error) $mensaje="File insert.";
else $mensaje="Error inserting";
header('Location: '.PATHSERVER."game/update/".$idGame);
if ( PRODUCTION==1 ) echo "<script type='text/javascript'>location.href='".PATHSERVER."game/update/".$idGame."</script>";
            

?>