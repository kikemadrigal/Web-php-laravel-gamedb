<?php include_once("./views/templates/document-start.php");?>
<?php

//Obtenemos los 10 últimos juegos
$games=GameRepository::getAll(0,10);
$contador=0;
echo "<div class='background-home'>";
	echo "<div class=''>";
		echo "<div class='flex-container'>";
			foreach ($games as $posicion=>$game){
				echo "<div class='".Util::getStyleFormat($game)."'>";
				echo "<a href='".PATHSERVER."game/show/".$game->getId()."'>".Util::cortarCadena($game->getTitle())."</a>";
				echo "</div>";
			}
		echo "</div>";
	echo "</div>";	
echo "</div>";		

?>
<?php include_once("./views/templates/document-end.php");?>

		






















			



