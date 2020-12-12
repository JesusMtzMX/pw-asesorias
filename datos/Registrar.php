<?php

    
    require_once '../datos/Asesorado_Dao.php';
    require_once '../modelo/Asesorado.php';


    $dao = new Asesorado_Dao();
    $asesorado = new Asesorado();

    if(isset($_POST["btnAsesorado"])){
        
        $asesorado->Nombre=$_POST["Nombre"];
        $asesorado->Apellidos=$_POST["Apellidos"];
        $asesorado->Email = $_POST["Email"];
        $asesorado->ClaveAcceso = $_POST["ClaveAcceso"];
        $asesorado->Telefono=$_POST["Telefono"];
        $asesorado->Foto=$_POST["Foto"];
       
        try{
           $dao->agregar($asesorado);
         // var_dump($_POST);
       
            header("location: ../app/iniciar_sesion.php");
            
        }catch(Exception $e){
            $_SESSION["success"]="registrado";
            
            header("location: ../app/index.php");
        } 
       

      }  else{
        $_SESSION["error"]=" no registrado";
        }
    

    

?>