<?php include_once('view2.php') ?>
<?php
/**
 * Created by PhpStorm.
 * User: movil
 * Date: 16/10/2018
 * Time: 19:05
 */

include 'dbconfig.php';

$all= "SELECT `ID`, `Farmacia`, `Domicilio`, `Telefonos`, `Email`,(SELECT `Zona` FROM `t_zona` WHERE `idZ`=`zonaid`) AS Zonas FROM `t_f` ORDER BY `Farmacia`,Zonas  ASC;"; // all
$xID="SELECT `ID`, `Farmacia`, `Domicilio`, `Telefonos`, `Email`,`zonaid` AS Zonas FROM `t_f`  WHERE `ID`=?"; //id
$del='DELETE FROM `t_f` WHERE `ID`=?';  // d
$Up='UPDATE `t_f` SET `Farmacia`=?,`Domicilio`=?,`Telefonos`=?,`Email`=?,`zonaid`=? WHERE `ID`=?';

$In="INSERT INTO `t_f`( `Farmacia`, `Domicilio`, `Telefonos`, `Email`, `zonaid`) VALUES (?,?,?,?,?)";

if(isset($_POST['ID'])) {
    $ID= (int) $_POST['ID'];
    $Farmacia =(isset($_POST["Farmacia"]))? strtoupper( $_POST['Farmacia']):"No definida";
    $Tel =(isset($_POST["Tel"]))? strtoupper( $_POST['Tel']):"No definido";
    $Domicilio =(isset($_POST["Domicilio"]))? strtoupper( $_POST['Domicilio']):"No definido";
    $Email =(isset($_POST["Email"]))? strtoupper( $_POST['Email']):"No definido";
    $Zona=(isset($_POST["Zona"]))? strtoupper( $_POST['Zona']):"No definido";

    if($ID>0){
        $stmt = $DBcon->prepare($Up);
        $stmt->execute([$Farmacia,$Domicilio,$Tel,$Email,$Zona,$ID]);
    }else{
        $stmt = $DBcon->prepare($In);
        $stmt->bindParam(1, $Farmacia);
        $stmt->bindParam(2, $Domicilio);
        $stmt->bindParam(3, $Tel);
        $stmt->bindParam(4, $Email);
        $stmt->bindParam(5, $Zona);
       // $stmt->bindParam(7, $ID);
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

/* ********************************************************* */
?>
