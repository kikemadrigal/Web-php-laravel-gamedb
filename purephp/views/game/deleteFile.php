<?php
//echo "<h2>fileGame".$idFileGame."game->".$idGame."</h2>";
$path =FileGameRepository::getPath($idFileGame);
unlink($path);
//echo "<h1>PAT------>".$path."</h1>";
/*if (!unlink($path)) {
    echo ("$path cannot be deleted due to an error");
}
else {
    echo ("$path has been deleted");
}*/
$error=FileGameRepository::delete($idFileGame);
if (!$error) $mensaje="File insert.";
else $mensaje="Error inserting";
header('Location: '.PATHSERVER."game/update/".$idGame);
if ( PRODUCTION==1 ) echo "<script type='text/javascript'>location.href='".PATHSERVER."game/update/".$idGame."</script>";
            

?>