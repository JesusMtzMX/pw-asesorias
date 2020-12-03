<?php
class Asesorado {
    public $IDAsesorado;
    public $Nombre;
    public $Apellidos;
    public $Email;
    public $ClaveAcceso;
    public $Telefono;
    public $Foto;

    function __construct(){}
    
    function __construct1($IDAsesorado,$Nombre,$Apellidos,
                            $Email,$ClaveAcceso,$Telefono, $Foto)
    {
        $this->IDAsesorado=$IDAsesorado;
        $this->Nombre=$Nombre;
        $this->Apellidos=$Apellidos;
        $this->Email=$Email;
        $this->ClaveAcceso=$ClaveAcceso;
        $this->Telefono=$Telefono;
        $this->Foto=$Foto;
    }

    function __construct2($IDAsesorado,$Nombre,$Apellidos,
                            $Email,$ClaveAcceso,$Telefono)
    {
        $this->IDAsesorado=$IDAsesorado;
        $this->Nombre=$Nombre;
        $this->Apellidos=$Apellidos;
        $this->Email=$Email;
        $this->ClaveAcceso=$ClaveAcceso;
        $this->Telefono=$Telefono;        
    }
}
?>