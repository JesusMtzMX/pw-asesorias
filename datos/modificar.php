<?php

    
    require_once '../datos/Asesorado_Dao.php';
    require_once '../modelo/Asesorado.php';

    $dao = new Asesorado_Dao();
    $asesorado = new Asesorado();

    if(isset($_POST["btnEditar"])){
        $asesorado->IDAsesoradp=$_POST["IDAsesorado"];
       
        try{
           $dao->editar($asesorado);
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