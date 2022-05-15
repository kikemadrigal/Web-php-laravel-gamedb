<?php
include_once("./views/templates/document-start.php"); 
//Obtenemos los 10 últimos juegos
//El text search lo obtenemos en el index
$games=GameUserRepository::getSearchGameUserByTitle($search,$_SESSION['idusuario']);
$contador=0;
echo "<div class=''>";
	echo "<div class='flex-container'>";
		foreach ($games as $posicion=>$game){
			if ($game->getSystem()=="MSX"){
				echo "<div class='cassette-MSX' >";
			}else if ($game->getSystem()=="PS4"){
				echo "<div class='cartucho-PS4' >";
			}else{
				echo "<div class='' >";
			}
			echo "<a href='".PATHSERVER."game/update/".$game->getId()."'>".Util::cortarCadena($game->getTitle())."</a>";
			echo "</div>";
		}
	echo "</div>";
echo "</div>";		
include_once("./views/templates/document-end.php"); 

?>