<?php

GameRepository::delete($idGame);
header("location: ".PATHSERVER);
if ( PRODUCTION==1 ) echo "<script type='text/javascript'>location.href='".PATHSERVER."';</script>";

?>