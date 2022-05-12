<?php 

include_once("./views/templates/document-start.php");
?>

<div class="flex-container">

<?php
dibujarButtons();
echo "<br><br>";
/*
r-lectura. Si no existe error.Cruso inicio
r+-Lectura y escritura.Si no existe:error.Cursor inicio.
w-Escritura. Si no existe:se creaa, cursor inicio
w+ lectura y escritura. Si no existe se crea. Cursor inicio
a-escritura. Si no existe se crea: cursor final
a+Lectura y escritura. si no existe se crea,cursor final
*/
    /*$contador=0;
    $contenido="";
    $fichero=fopen("./sql/games.sql","r");
    if (!feof($fichero)){
        $contador++;
        $contenido=fread($fichero,8192);
    }
    fclose($fichero);
    echo $contenido;*/
    //1.Obtenemos todos los juegos
    $games=GameUserRepository::getAllGamesByUser($_SESSION['idusuario'], 0, 10000);
    //2.Creamos el archivo y los directorios
    if (!file_exists("media/users")) {
        mkdir("media/users", 0777, true);
    }
    if (!file_exists("media/users/user".$_SESSION['idusuario'])) {
        mkdir("media/users/user".$_SESSION['idusuario'], 0777, true);
    }

    $path="media/users/user".$_SESSION['idusuario']."/database.txt";
    $zipFile="media/users/user".$_SESSION['idusuario']."/database.zip";
    $fp = fopen($path, "w");
    //3.Escribimos en el archivo
    foreach ($games as $posicion=>$game){
        fwrite($fp, $game->toString()."\n\r");
    }
    fclose($fp);
    $zip = new ZipArchive();
    $zip->open($zipFile, ZipArchive::CREATE);
    $zip->addFile($path, 'database.txt');
    $zip->close();
    if(PRODUCTION==1){
        echo "<a href='".PATHSERVERSININDEX.$zipFile."' class='btn btn-outline-primary'>Download TXT</a><br>";
    }else{
        echo "<a href='".$zipFile."' class='btn btn-outline-primary'>Download TXT</a><br>";
    }
    
    echo "</div>";
    echo "<br>";
    echo "Save in file: ".$path."<br>";
    echo "Show information from file: ".$path."<br>";
    echo "<br>";
    $contenido="";
    $fichero=fopen($path,"r");
    for ($i = 0; $i < filesize($path); $i++) {
        $contenido=fgets($fichero,8192);
        $contenido.="<br>";
        echo $contenido;
    }
    fflush($fichero);
    fclose($fichero);
function dibujarButtons(){
    ?>
    <a href='<?php echo PATHSERVER ?>database/show' class='btn btn-outline-primary btn-lg active'>TXT</a>
    <a href="<?php echo PATHSERVER ?>database/csv"  class="btn btn-outline-secondary btn-lg">CSV</a>
    <a href="<?php echo PATHSERVER ?>database/mysql" class="btn btn-outline-success btn-lg" >MYSQL</a>
    <a href="" class="btn btn-outline-danger btn-lg">sqlite</a>
    <a href=""  class="btn btn-outline-warning btn-lg">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</a>
    <a href=""  class="btn btn-outline-info btn-lg">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</a>
    <a href=""  class="btn btn-outline-dark btn-lg">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</a>
    <?php
}


?>

<?php include_once("./views/templates/document-end.php");?>