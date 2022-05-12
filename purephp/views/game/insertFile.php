<?php
$mensaje="";
$path = "";
if (isset($_POST['submit'])){
    //$text=$_POST['text'];
    $fileName = $_FILES['archivo']['name']; 
    $tipo_archivo = $_FILES['archivo']['type']; 
    $tamano_archivo = $_FILES['archivo']['size']; 
    //txt: text/plain
    //cas: application/octet-stream
    if (!(strpos($tipo_archivo, "plain") || strpos($tipo_archivo, "pdf") || strpos($tipo_archivo, "doc") || strpos($tipo_archivo, "docx") || strpos($tipo_archivo, "octet-stream") || strpos($tipo_archivo, "rom") || strpos($tipo_archivo, "dsk") || strpos($tipo_archivo, "tsx") || $tamano_archivo > 900000)) 
    {
        echo "<h1>".$tipo_archivo."</h1>";
        $fileName="sinimagen.png";
        echo "El archivo no tiene el formato o el tam&ntilde;o correcto, solo se aceptan, pdf, txt, doc y docx menores de 90Mb.<br />";
    }else
    { 
        //1.Formateamos el nombre de la imagen
        $fileName=Util::formatearTexto($fileName);
        //2.Creamos el path para subir las fotos según los usuarios
        //media/
        if (!file_exists("media")) {
            mkdir("media", 0777, true);
        }
        //media/users/
        if (!file_exists("media/users")) {
            mkdir("media/users", 0777, true);
        }
        //media/users/user186
        if (!file_exists("media/users/user".$_SESSION['idusuario'])) {
            mkdir("media/users/user".$_SESSION['idusuario'], 0777, true);
        }
        $path="media/users/user".$_SESSION['idusuario']."/".$fileName;
        move_uploaded_file($_FILES['archivo']['tmp_name'], $path);
        $fileGame=new FileGame(0);
        $fileGame->setName($fileName);
        $fileGame->setPath($path);
        //La variable $idGame aparece en el index
        $fileGame->setGame($idGame);
        $error=FileGameRepository::insert($fileGame);
        if (!$error) $mensaje="File ".$fileName." insert.";
        else $mensaje="Error inserting";

        header('Location: '.PATHSERVER."game/update/".$idGame);
        if ( PRODUCTION==1 ) echo "<script type='text/javascript'>location.href='".PATHSERVER."game/update/".$idGame."'</script>";
    } 	
			
}
?>