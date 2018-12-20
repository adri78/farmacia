<?php include_once('view2.php') ?>
<?php
/**
 * Created by PhpStorm.
 * User: movil
 * Date: 16/10/2018
 * Time: 19:05
 */

include 'dbconfig.php';

$all= "SELECT `iddu`, `contacto`, `tel`, `domicio` FROM `t_duenio` ORDER BY `contacto` ASC;"; // all
$xID="SELECT `iddu`, `contacto`, `tel`, `domicio` FROM `t_duenio` WHERE `iddu`=?"; //id
$del='DELETE FROM `t_duenio` WHERE `iddu`=?';  // d
$Up='UPDATE `t_duenio` SET `contacto`=?,`tel`=?,`domicio`=? WHERE `iddu`=?' ;

$In="INSERT INTO `t_duenio`(`contacto`, `tel`, `domicio`) VALUES (?,?,?)";

if(isset($_POST['ID'])) {
     $ID= (int) $_POST['ID'] ;

     // Emparejo los campos  {Dato:Data,ID:Id,Tel:tel,Domicilio:Domicilio};
    $Data1 =(isset($_POST["Dato"]))? strtoupper( $_POST['Dato']):"No definida";// contacto
    $Tel =(isset($_POST["Tel"]))? strtoupper( $_POST['Tel']):"No definido";// contacto
    $Domicilio =(isset($_POST["Domicilio"]))? strtoupper( $_POST['Domicilio']):"No definida";// contacto

    if($ID>0){
        $stmt = $DBcon->prepare($Up);
        $stmt->execute([$Data1,$Tel,$Domicilio,$ID]);
    }else{
        $stmt = $DBcon->prepare($In);
        $stmt->bindParam(1, $Data1);
        $stmt->bindParam(2, $Tel);
        $stmt->bindParam(3, $Domicilio);
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
            $userData['ALLData'][] = $row;
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

/* ********************************************************* */
?>
