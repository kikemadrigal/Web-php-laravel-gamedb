
<?php include_once("./views/templates/document-start.php"); 
if (isset($_POST['submit'])){
	$idUser=$_POST['idUser'];
    $games=GameUserRepository::getGameUserByTitle($idUser,0,50);
    
}

?>

<div class="row">
    <div class="col col-md-4 background-blue">
        <h3>Select User</h3>
        <form name="searchByUserForm"  class='form-horizontal' id="searchByUserForm" action="<?php echo PATHSERVER."game/showByUser" ?>" method="post">
            <?php
            $users=UserRepository::getALLUsers();
            echo "<select class='m-4' name='idUser' id='iduser' > ";
            foreach ($users as $posicion=>$user){
                echo "<option value='".$user->getId()."' >".$user->getName()."</option>";
            }
            echo "</select>";
            ?>
            <input type="submit" name="submit" class="btn btn-primary btn-large" value="Show" />
        </form>
    </div> 


    <div class='col col-md-8'>
        <h3>Select game user</h3>
        <?php 
        if (isset($_POST['idUser'])){
            ?>
            <form class="d-flex col-md-4" method=post action='<?php echo PATHSERVER; ?>game/showByUser'>
                <input class="form-control" type="search" name="search" id="search" placeholder="Search your games" aria-label="search your games">
                <input type="hidden" name="idUserSearch" value="<?php echo $_POST['idUser'] ?>" />
                <button class="btn btn-outline-success" type="submit" name="submitSearch">Search</button>
            </form>
            <?php
            foreach ($games as $posicion=>$game){
                echo "<a href='".PATHSERVER."game/show/".$game->getId()."'>".Util::cortarCadena($game->getTitle())."</a><br>";
            }
            ?>

            <?php
        }
        if(isset($_POST['submitSearch'])){
            ?>
            <form class="d-flex col-md-4" method=post action='<?php echo PATHSERVER; ?>game/showByUser'>
                <input class="form-control" type="search" name="search" id="search" placeholder="Search your games" aria-label="search your games">
                <input type="hidden" name="idUserSearch" value="<?php echo $_POST['idUserSearch'] ?>" />
                <button class="btn btn-outline-success" type="submit" name="submitSearch">Search</button>
            </form>

            <?php
            $games=GameUserRepository::getSearchGameUserByTitle($_POST['search'],$_POST['idUserSearch']);
            foreach ($games as $posicion=>$game){
                echo "<a href='".PATHSERVER."game/show/".$game->getId()."'>".Util::cortarCadena($game->getTitle())."</a><br>";
            }
        }
        ?>
    </div>
</div>








<?php include_once("./views/templates/document-end.php"); ?>