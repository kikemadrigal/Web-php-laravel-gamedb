<?php include_once("./views/templates/document-start.php");
dibujarButtons();
echo "<br><br>";
$path="media/users/user".$_SESSION['idusuario']."/database.csv";
$fp = fopen($path, 'w+');
if(PRODUCTION==1){
    echo "<a href='".PATHSERVERSININDEX.$path."' class='btn btn-outline-primary'>Download CSV file</a><br>";
}else{
    echo "<a href='".$path."' class='btn btn-outline-primary'>Download CSV file</a><br>";
}
$db= new MysqliClient();
$db->conectar_mysql();
$games=GameUserRepository::getAllGamesByUser($_SESSION['idusuario'],0,1000);
$titles=array("id","title","cover","instructions","country","publisher","developer","year","format","genre","system","programming","sound","control","players","languages","file","screenshot","video","iGoIt","broken","observations");
fputcsv($fp, $titles,";");
foreach($games as $posicion=>$valor){
    $string= $valor->toStringCSV();
    $array=explode("\,",$string);
    $string=str_replace("\,",",",$string);
    echo "id"."   \t title  ".  " \t cover  "."  instructions  "."  country  "."  publisher  "."  developer  "."  year  "."  format  "."  genre  "."  system  "."  programming  "."  sound  "."  control  "."  players  "."  languages  "."  file  "."  screenshot  "."  video  "."  iGoIt  "."  broken  "."  observations"."<br>";
    echo $string."<br>";
    fputcsv($fp, $array,";");
}
/*
$lista = array (array('a1','a2',10), array('b1','b2',20), array('c1','c2',30),array('d1','d2',40));
$lista1 = array ('a  aa', 'bb  b', 1547, '   dddd');
$lista2 = array ('aaa', 'bbb', 1547, 'dddd');
$lista3 = array ('aaa', 'bbb', 1547, 'dddd');
fputcsv($fp, $lista1,";");
fputcsv($fp, $lista2,";");
fputcsv($fp, $lista3,";");

foreach($lista as $valor){
    //Implode convierte un array en un string
    $texto=implode($valor);
    echo $texto.";";
}
echo "<br>";
*/
fclose($fp);
function dibujarButtons(){
    ?>
    <a href='<?php echo PATHSERVER ?>database/show' class='btn btn-outline-primary btn-lg '>TXT</a>
    <a href="<?php echo PATHSERVER ?>database/csv" class="btn btn-outline-secondary btn-lg active">CSV</a>
    <a href="<?php echo PATHSERVER ?>database/mysql" class="btn btn-outline-success btn-lg" >MYSQL</a>
    <a href="" class="btn btn-outline-danger btn-lg">sqlite</a>
    <a href=""  class="btn btn-outline-warning btn-lg">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</a>
    <a href=""  class="btn btn-outline-info btn-lg">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</a>
    <a href=""  class="btn btn-outline-dark btn-lg">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</a>
    <?php
}




include_once("./views/templates/document-end.php");?>
