<?php

    require_once '../datos/Asesor_Dao.php';
    require_once '../modelo/Asesor.php';


    $dao = new Asesor_Dao();
    $asesor = new Asesor();

    if(isset($_POST["btn-asesor"])){

        
        $Asesor->Nombre=$_POST['Nombre'];
        $Asesor->Apellidos=$_POST['Aellidos'];
        $Asesor->Email = $_POST['Email'];
        $Asesor->ClaveAcceso = $_POST['ClaveAcceso'];
        $Asesor->Telefono=$_POST['Telefono'];
        $Asesor->DescripcionPerfil=$_POST['DescripcionPerfil'];
        $Asesor->TemasOfrecidos=$_POST['TemasOfrecidos'];
        $Asesor->Paypal=$_POST['Paypal'];
        $Asesor->Foto=$_POST['Foto'];
        
        try{
            $dao->agregar($Asesor);

        }catch(Exception $e){
            $_SESSION["success"]="registrado";
            header
        } 

      }  else{
        $_SESSION["error"]=" no registrado";
        }
    

    

?>