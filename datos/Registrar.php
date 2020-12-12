<?php

    
    require_once '../datos/Asesorado_Dao.php';
    require_once '../modelo/Asesorado.php';


    $dao = new Asesorado_Dao();
    $asesorado = new Asesorado();

    if(isset($_POST["btn-asesorado"])){

        
        $Asesorado->Nombre=$_POST['Nombre'];
        $Asesorado->Apellidos=$_POST['Aellidos'];
        $Asesorado->Email = $_POST['Email'];
        $Asesorado->ClaveAcceso = $_POST['ClaveAcceso'];
        $Asesorado->Telefono=$_POST['Telefono'];
        $Asesorado->Foto=$_POST['Foto'];

        try{
            $dao->agregar($Asesorado);

        }catch(Exception $e){
            $_SESSION["success"]="registrado";
        } 

      }  else{
        $_SESSION["error"]=" no registrado";
        }
    

    

?>