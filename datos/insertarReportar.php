<?php

    
    require_once '../datos/Reportar_Dao.php';
    require_once '../modelo/Reportar.php';


    $dao = new Reportar_Dao();
    $reporte = new Reportar();

    if(isset($_POST["btnreportar"])){
        
        $reporte->Motivo=$_POST["Motivo"];
        $reporte->Descripcion=$_POST["Descripcion"];

       
        try{
           $dao->agregar($reporte);
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