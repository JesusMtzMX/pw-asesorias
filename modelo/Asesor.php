<?php
class Asesor {
    public $IDAsesor;
    public $Nombre;
    public $Apellidos;
    public $Email;
    public $ClaveAcceso;
    public $Telefono;
    public $DescripcionPerfil;
    public $TemasOfrecidos;
    public $Foto;

    function __construct(){}
    
    function __construct1($IDAsesor, $Nombre, $Apellidos,
                            $Email, $ClaveAcceso, $Telefono,  $DescripcionPerfil, $TemasOfrecidos, $Foto)
    {
        $this->IDAsesor=$IDAsesor;
        $this->Nombre=$Nombre;
        $this->Apellidos=$Apellidos;
        $this->Email=$Email;
        $this->ClaveAcceso=$ClaveAcceso;
        $this->Telefono=$Telefono;
        $this->DescripcionPerfil = $DescripcionPerfil;
        $this->TemasOfrecidos = $TemasOfrecidos;
        $this->Foto=$Foto;
    }

    function __construct2($IDAsesor,$Nombre,$Apellidos,
                            $Email,$ClaveAcceso,$Telefono)
    {
        $this->IDAsesor=$IDAsesor;
        $this->Nombre=$Nombre;
        $this->Apellidos=$Apellidos;
        $this->Email=$Email;
        $this->ClaveAcceso=$ClaveAcceso;
        $this->Telefono=$Telefono;        
    }
}
?>