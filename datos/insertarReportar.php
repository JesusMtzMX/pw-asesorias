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
             header("location: ../app/index.php");
        }catch(Exception $e){
            $_SESSION["success"]="registrado";
            
            
        } 
       

      }  else{
        $_SESSION["error"]=" no registrado";
        }
    

    

?>