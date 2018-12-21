<?php include_once('view2.php') ?>
<?php
/**
 * Created by PhpStorm.
 * User: movil
 * Date: 16/10/2018
 * Time: 19:05
 */

include 'dbconfig.php';

$all= "SELECT `idZ`, `Zona` FROM `t_zona` ORDER BY `Zona` ASC;;"; // all
$xID="SELECT `idZ`, `Zona` FROM `t_zona` WHERE `idZ`=?"; //id
$del='DELETE FROM `t_zona` WHERE `idZ`=?';  // d
$Up='UPDATE `t_zona` SET `Zona`=? WHERE `idZ`=?' ;

$In="INSERT INTO `t_zona`(`Zona`) VALUES (?)";

if(isset($_POST['ID'])) {
     $ID= (int) $_POST['ID'] ;

    $Zona=(isset($_POST["Zona"]))? strtoupper( $_POST['Zona']):"Sin Zona";

    if($ID>0){
        $stmt = $DBcon->prepare($Up);
        $stmt->execute([$Zona,$ID]);
    }else{
        $stmt = $DBcon->prepare($In);
        $stmt->bindParam(1, $Zona);
        $stmt->execute();
    }
}


// Listar

    if(isset($_GET['all'])){

        $query =$all;
        $stmt = $DBcon->prepare($query);
        $stmt->execute();
        $userData = array();

        while($row=$stmt->fetch(PDO::FETCH_ASSOC)){
            $userData['DataLst'][] = $row;
        }
        echo json_encode($userData);
    }


// Por ID

    if(isset($_GET['id']) && !empty($_GET['id'])){
        $id =$_GET['id'];
        $stmt = $DBcon->prepare($xID);
        $stmt->execute([$id]);

        while($row=$stmt->fetch(PDO::FETCH_ASSOC)){
            $Data['Data'][] = $row;
        }
        echo json_encode($Data);
    }

// Detele

    if(isset($_GET['d'])){
        $id =$_GET['d'];
        $stmt_delete = $DBcon->prepare($del);
        $stmt_delete->execute([$id]);
    }

//$stmt->close();
?>
