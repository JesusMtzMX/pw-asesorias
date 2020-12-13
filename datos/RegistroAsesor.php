<?php

require_once '../datos/Asesor_Dao.php';
require_once '../modelo/Asesor.php';

$dao = new Asesor_Dao();
$asesor = new Asesor();

if(isset($_POST["btnasesor"])){
    
    $asesor->Nombre=$_POST["Nombre"];
    $asesor->Apellidos=$_POST["Apellidos"];
    $asesor->Email = $_POST["Email"];
    $asesor->ClaveAcceso = $_POST["ClaveAcceso"];
    $asesor->Telefono = $_POST["Telefono"];
    $asesor->DescripcionPerfil=$_POST["DescripcionPerfil"];
    $asesor->TemasOfrecidos=$_POST["TemasOfrecidos"];
   
    $asesor->Paypal=$_POST["Paypal"];

    try{
      if(!empty( $_FILES['Foto']) &&  $_FILES['Foto']['size']>0){
       
        $asesor->Foto=basename($_FILES['Foto']['name']);
        $dir_subir='files/'. $asesor->Foto;
        $enviar=move_uploaded_file($_FILES['Foto']['tmp_name'],$dir_subir);
        
      
       $dao->agregar($asesor);
      }

     // var_dump($_POST);
       header("location: ../app/iniciar_sesion.php");
     //   require_once 'menu_asesor.php'
    }catch(Exception $e){
        $_SESSION["success"]="registrado";
        
        //var_dump($e);
       header("location: ../app/index.php");
    } 
   

  }  else{
    $_SESSION["error"]=" no registrado";
    }


?>