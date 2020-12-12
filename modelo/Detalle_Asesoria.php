<?php
class Detalle_Asesoria {
    public $Asesor;
    public $Asesorado;
    public $Tema;
    public $Area;
    public $Fecha;
    public $Hora;
    public $Estatus;

    function __construct(){}
    
    function __construct1($Asesor, $Asesorado, $Tema, $Area, $Fecha, $Hora, $Estatus)
    {
        $this->Asesor=$Asesor;
        $this->Asesorado=$Asesorado;
        $this->Tema=$Tema;
        $this->Area=$Area;
        $this->Fecha=$Fecha;
        $this->Hora=$Hora;
        $this->Estatus=$Estatus;
    }
}
?>