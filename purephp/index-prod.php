<?php
//VERSION PRODUCTION
/**
 * Para la producción: 
 * 1.Cambia el archivo index.php por la versión producción o desarrollo
 * 2.Cambia la variable de entorno PRODUCTION que está en .env
 * 
 */
/*para trabajr con rutas:
1.Modicamos el archivo de host de windows(abrelo como admimistrador) que están en C:\Windows\System32\drivers\etc\hosts:
#---------------------
#   virtual hosts
#--------------------
127.0.0.1	gestordb.es/index

2.Modificamos los host virtuales de apache que están en C:\xampp\apache\conf\extra\httpd-vhosts.conf
<VirtualHost *:80>
    DocumentRoot "C:/xampp/htdocs/gamedb"
    ServerName gamedb.es/index
</VirtualHost>
*/
//El index hace de enrutador
session_start();


include_once("./app/env.php");

require_once('./app/Util.php');
include_once("./app/Game.php");
include_once("./app/FileGame.php");
include_once("./app/ScreenShotGame.php");
include_once("./app/VideoGame.php");
include_once("./app/WebGame.php");
include_once("./app/FileGameRepository.php");
include_once("./app/ScreenShotGameRepository.php");
include_once("./app/VideoGameRepository.php");
include_once("./app/WebGameRepository.php");

require_once('./app/GameRepository.php');
require_once('./app/GameUserRepository.php');
include_once("./app/User.php");
require_once("./app/UserRepository.php");
include_once("./app/MultimediaRepository.php");
include_once("./app/Multimedia.php");
include_once("./app/MysqliClient.php");
include_once("./app/ViewsUsersRepository.php");


$production=1;
//Ibtenemos la URL
$componentesUrl=parse_url($_SERVER["REQUEST_URI"]);
//sacamos solo la ruta del final, toda la dirección menos la parte del servivor
$ruta=$componentesUrl["path"];
//Obtenemos los partes de la ruta
$partesRuta=explode("/", $ruta);
//echo var_dump($partesRuta);
//echo "<br>";
//echo $_SESSION['idusuario']."<br>";


/***********************************
*               GAME 
***********************************/  
if($partesRuta[2]=="game"){
    if($partesRuta[3]=="show"){
        if (isset($partesRuta[4])) $idGame=$partesRuta[4];
        include_once("views/game/show.php");
    //Muestra en una vistas elegidas por el usuario los games
    }else if($partesRuta[3]=="showUser"){
        if(isset($_SESSION['idusuario']) && $_SESSION['nivelaccesousuario']==3){
            include_once("views/game/showUser.php");
        }
    //Permite visalizar los juegos de los uaurios dados de alta
    }else if($partesRuta[3]=="showByUser"){
        include_once("views/game/showByUser.php");
    }else if($partesRuta[3]=="search"){
        $search=$_POST['search'];
        include_once("views/game/search.php"); 
    }else if($partesRuta[3]=="insert"){
        if(isset($_SESSION['idusuario']) && $_SESSION['nivelaccesousuario']==1){
            include_once("views/game/insert.php");
        }else if(isset($_SESSION['idusuario']) && $_SESSION['nivelaccesousuario']==3){
            include_once("views/game/insertUser.php");
        }
    }else if($partesRuta[3]=="insertFile"){
        $idGame=$_POST['idGame'];
        include_once("views/game/insertFile.php");
    }else if($partesRuta[3]=="insertScreenShot"){
        $idGame=$_POST['idGame'];
        include_once("views/game/insertScreenShot.php");
    }else if($partesRuta[3]=="insertVideo"){
        $idGame=$_POST['idGame'];
        $text=$_POST['text'];
        include_once("views/game/insertVideo.php");
    }else if($partesRuta[3]=="insertWeb"){
        $idGame=$_POST['idGame'];
        $text=$_POST['text'];
        include_once("views/game/insertWeb.php");
    }else if($partesRuta[3]=="update"){
        if (isset($_POST['id'])){
            $idGame=$_POST['id'];
        }else{
            $idGame=$partesRuta[4];
        }
        if(isset($_SESSION['idusuario']) && $_SESSION['nivelaccesousuario']==1){
            include_once("views/game/update.php");
        }else if(isset($_SESSION['idusuario']) && $_SESSION['nivelaccesousuario']==3){
            include_once("views/game/updateUser.php");
        }
    }else if($partesRuta[3]=="delete"){
        $idGame=$partesRuta[4];
        if(isset($_SESSION['idusuario']) && $_SESSION['nivelaccesousuario']==1){
            include_once("views/game/delete.php");
        }else if(isset($_SESSION['idusuario']) && $_SESSION['nivelaccesousuario']==3){
            include_once("views/game/deleteUser.php");
        }
    }else if($partesRuta[3]=="deleteFile"){
        $idGame=$_POST['idGame'];
        $idFileGame=$_POST['idFileGame'];
        include_once("views/game/deleteFile.php");
    }else if($partesRuta[3]=="deleteScreenShot"){
        $idGame=$_POST['idGame'];
        $idScreenShotGame=$_POST['idScreenShotGame'];
        include_once("views/game/deleteScreenShot.php");
    }else if($partesRuta[3]=="deleteVideo"){
        $idGame=$_POST['idGame'];
        $idVideoGame=$_POST['idVideoGame'];
        include_once("views/game/deleteVideo.php");
    }else if($partesRuta[3]=="deleteWeb"){
        $idGame=$_POST['idGame'];
        $idWebGame=$_POST['idWebGame'];
        include_once("views/game/deleteWeb.php");
    }
/***********************************
*          END GAME
***********************************/
/***********************************
*               AUTH 
***********************************/   
}else if($partesRuta[2]=="login"){
    include_once("views/auth/login.php");
}else if($partesRuta[2]=="logout"){
    include_once("views/auth/logout.php");
}
else if($partesRuta[2]=="register"){
    include_once("views/auth/register.php");
}else if($partesRuta[2]=="mailValidation"){
    if(isset($partesRuta[3])&& isset($partesRuta[4])){
        $nombreUsuario=$partesRuta[3];
        $codigoDeActivacion=$partesRuta[4];
    }
    include_once("views/auth/mailValidation.php");
}else if($partesRuta[2]=="resetPassword"){
    include_once("views/auth/resetPassword.php");
}else if($partesRuta[2]=="recoveryPassword"){
    include_once("views/auth/recoveryPassword.php");
}
/***********************************
*               END AUTH 
***********************************/   
/***********************************
*               USER 
***********************************/  
else if($partesRuta[2]=="user"){
    if($partesRuta[3]=="update"){
        include_once("views/user/update.php");
    }
}
/***********************************
*               END USER 
***********************************/  
/***********************************
*               MULTIMEDIA 
***********************************/  
else if($partesRuta[2]=="media"){
    if($partesRuta[3]=="showAll"){
        if(isset($_SESSION['idusuario']) && $_SESSION['nivelaccesousuario']==3){
            include_once("views/media/showAllUser.php");
        }
    }else if($partesRuta[3]=="update"){
        include_once("views/media/update.php");
    }else if($partesRuta[3]=="insert"){
        include_once("views/media/insert.php");
    }else if($partesRuta[3]=="delete"){
        $idMedia=$_POST['id'];
        include_once("views/media/delete.php");   
    }
}
/***********************************
*               END MULTIMEDIA 
***********************************/  
else if($partesRuta[2]=="home"){
    if(isset($_SESSION['idusuario']) && $_SESSION['nivelaccesousuario']==3){
        include_once("views/game/showUser.php");
    }else{
        include_once("views/home.php");
    }
}else if($partesRuta[2]=="about"){
    include_once("views/about.php");
}else if($partesRuta[2]=="webs"){
    include_once("views/webs.php");
}else if($partesRuta[2]=="database"){
    if($partesRuta[3]=="show"){
        include_once("views/database/show.php");
    }else if($partesRuta[3]=="mysql"){
        include_once("views/database/mysql.php");
    }else if($partesRuta[3]=="csv"){
        include_once("views/database/csv.php");
    }
/***********************************
*               END DATABASE 
***********************************/  
}else if($partesRuta[2]==""){
    if(isset($_SESSION['idusuario']) && $_SESSION['nivelaccesousuario']==3){
        include_once("views/game/showUser.php");
    }else{
        include_once("views/home.php");
    }
}
else {
    echo "Error 404<br>";
    var_dump($partesRuta);
}



?>

		

