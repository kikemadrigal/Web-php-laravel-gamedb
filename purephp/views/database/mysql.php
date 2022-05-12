<?php include_once("./views/templates/document-start.php");
dibujarButtons();


//Crear base de datos
//Create database gamedb;
//use gamedb;

echo "<h1>Tables: </h1>";
$db= new MysqliClient();
$db->conectar_mysql();
$tables=$db->getTables();

/**Tabla gamesusers */

foreach($tables as $posicion=>$table){
    echo "<h3>".$table."</h3>";
    /*INSERT INTO gamesUsers VALUES 
        (7, 'Robocop', '1', '', '', 'Erbe', 'Ocean', 1, '', '', 'MSX', '', '', '', '', '', 1, 1, 1, 1, 1, '', 186),
        (8, 'World games', '1', '', '', 'Erbe', 'Epix', 1, '', '', 'MSX', '', '', '', '', '', 1, 1, 1, 1, 1, '', 186);
    */
    $consulta="";
    $contador=0;
    $resultado2 = $db->ejecutar_sql("SELECT * FROM $table");
    if ($table=="gamesUsers" || $table=="gamesusers"){
        $mysqli = $db->getMysqliObject();
        $rows=$mysqli->affected_rows;
        $consulta="INSERT INTO 'gamesUsers' VALUES";
        echo "<h3>Results: ".$rows."</h3>";
        while ($linea = mysqli_fetch_array($resultado2)) 
        {
            $contador++;
            $consulta .="<br>&nbsp;&nbsp;&nbsp;&nbsp;(";
            $consulta .=$linea['id'].",";
            $consulta .="'".$linea['title']."',";
            $consulta .="".$linea['cover'].",";
            $consulta .="'".$linea['instructions']."',";
            $consulta .="'".$linea['country']."',";
            $consulta .="'".$linea['publisher']."',";
            $consulta .="'".$linea['developer']."',";
            $consulta .="".$linea['year'].",";
            $consulta .="'".$linea['format']."',";
            $consulta .="'".$linea['genre']."',";
            $consulta .="'".$linea['system']."',";
            $consulta .="'".$linea['programming']."',";
            $consulta .="'".$linea['sound']."',";
            $consulta .="'".$linea['control']."',";
            $consulta .="".$linea['players'].",";
            $consulta .="'".$linea['languages']."',";
            $consulta .="".$linea['file'].",";
            $consulta .="".$linea['screenshot'].",";
            $consulta .="".$linea['iGoIt'].",";
            $consulta .="".$linea['broken'].",";
            if($contador==$rows) $consulta .="'".$linea['observations']."');<br><br>";
            else $consulta .="'".$linea['observations']."'),";
        }        
    }
   echo $consulta;
}

function dibujarButtons(){
    ?>
    <a href='<?php echo PATHSERVER ?>database/show' class='btn btn-outline-primary btn-lg '>TXT</a>
    <a href="<?php echo PATHSERVER ?>database/csv" class="btn btn-outline-secondary btn-lg">CSV</a>
    <a href="<?php echo PATHSERVER ?>database/mysql" class="btn btn-outline-success btn-lg active" >MYSQL</a>
    <a href="" class="btn btn-outline-danger btn-lg">sqlite</a>
    <a href=""  class="btn btn-outline-warning btn-lg">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</a>
    <a href=""  class="btn btn-outline-info btn-lg">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</a>
    <a href=""  class="btn btn-outline-dark btn-lg">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</a>
    <?php
}

 include_once("./views/templates/document-end.php");?>