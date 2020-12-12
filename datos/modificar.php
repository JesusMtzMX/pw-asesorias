<?php

    
    require_once '../datos/Asesorado_Dao.php';
    require_once '../modelo/Asesorado.php';

    $asesorado->IDAsesoradp=$_GET["IDAsesorado"];
  
    $dao = new Asesorado_Dao();
    $asesorado = new Asesorado();

    if(isset($_POST["btnEditar"])){
      
        $asesorado->Nombre=$_POST["Nombre"];
        $asesorado->Apellidos=$_POST["Apellidos"];
        $asesorado->Email = $_POST["Email"];
        $asesorado->ClaveAcceso = $_POST["ClaveAcceso"];
        $asesorado->Telefono=$_POST["Telefono"];
        $asesorado->Foto=$_POST["Foto"];
       
        try{
       //    $dao->editar($asesorado);
         
         // var_dump($_POST);
            //header("location: ../app/iniciar_sesion.php");
        }catch(Exception $e){
            $_SESSION["success"]="registrado";
            
            header("location: ../app/index.php");
        } 
        var_dump($asesorado);
        var_dump($_POST);
        var_dump($_GET);

      }  else{
        $_SESSION["error"]=" no registrado";
        }
    

    

?>