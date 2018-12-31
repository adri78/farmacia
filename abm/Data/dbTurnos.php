<?php include_once('view2.php') ?>
<?php
/**
 * Created by PhpStorm.
 * User: movil
 * Date: 16/10/2018
 * Time: 19:05
 */

include 'dbconfig.php';

$hoy=date("Y-m-d");


$all= "SELECT `IDT`, `Farmacia` ,(SELECT `Zona` FROM `t_zona` WHERE `idZ`= `zonaid`) AS `Zona`, `fni` as Fecha FROM `t_t`,`t_f` WHERE (`fid`=`ID`) and `fni` >='".$hoy."' ;"; // all
$xID="SELECT `IDT`, `fid`,`zonaid` , `fni` FROM `t_t`,`t_f` WHERE (`fid`=`ID`) and `IDT`=?"; //id
$xDia="SELECT `IDT`, `fid`, `fni` FROM `t_t` WHERE `fni`=?";


$del='DELETE FROM `t_t` WHERE `IDT`=?';  // d
$Up='UPDATE `t_t` SET `fid`=?, `fni`=? WHERE `IDT`=?' ;

$In="INSERT INTO `t_t`(`fid`, `fni`) VALUES (?,?)";

if(isset($_POST['ID'])) {
    $ID= (int) $_POST['ID'] ;
    $Far=(isset($_POST["Far"]))? strtoupper( $_POST['Far']):"Fallo";
    $Fecha=(isset($_POST["Fecha"]))? strtoupper( $_POST['Fecha']):$hoy;
    $Repe=(isset($_POST["Repe"]))? ( $_POST['Repe']):'off';
    $Cada=(isset($_POST["Cada"]))? (int) $_POST['Cada']:0;



    if($ID>0){
        $stmt = $DBcon->prepare($Up);
        $stmt->execute([$Far,$Fecha,$ID]);
    }else{
        $stmt = $DBcon->prepare($In);
        $stmt->bindParam(1, $Far);
        $stmt->bindParam(2, $Fecha);
        $stmt->execute();

        echo $Repe;
        if(($Repe)&&($Cada > 0)){
            echo
             $FechaFin=date('Y-m-d', strtotime("$Fecha + 365 day")) ;
                 while ( $FechaFin>$Fecha) {
                     $Fecha=date('Y-m-d', strtotime("$Fecha + $Cada day"));
                     $stmt->bindParam(1, $Far);
                     $stmt->bindParam(2, $Fecha);
                     $stmt->execute();

                 }
        }
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

// xZona
    if(isset($_GET['z'])){
        $z=$_GET['z'];
        if($z <1){
            $query =$all;
        }else{
            $query ="SELECT `IDT`, `Farmacia` ,(SELECT `Zona` FROM `t_zona` WHERE `idZ`= `zonaid`) AS `Zona`, `fni` as Fecha FROM `t_t`,`t_f` WHERE (`fid`=`ID`) and  `zonaid`=".$z .";"; //id
        }
  //echo $query;
        $stmt = $DBcon->prepare($query);
        $stmt->execute();
        $userData = array();
        while($row=$stmt->fetch(PDO::FETCH_ASSOC)){
            $userData['DataLst'][] = $row;
        }
        echo json_encode($userData);
    }

// xDia
if(isset($_GET['di'])){
      $query ="SELECT `IDT`, `Farmacia` ,(SELECT `Zona` FROM `t_zona` WHERE `idZ`= `zonaid`) AS `Zona`, `fni` as Fecha FROM `t_t`,`t_f` WHERE (`fid`=`ID`) and `fni`='".$_GET['di'] ."';"; //id
     //echo $query;
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
