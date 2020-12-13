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
     //     if(!empty( $_FILES['Foto']) &&  $_FILES['Foto']['size']>0){
        //    $dir_subir='files/'. $asesorado->Foto;

      //      $enviar=move_uploaded_file($_FILES['Foto']['tmp_name'],$dir_subir);
            $dao->agregar($asesorado);

      //    }
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