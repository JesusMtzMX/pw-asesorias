<?php
class Detalle_Asesoria {
    public $IDAsesoria;
    public $Asesor;
    public $Asesorado;
    public $Tema;
    public $Area;
    public $Fecha;
    public $Hora;
    public $Estatus;

    function __construct(){}
    
    function __construct1($IDAsesoria, $Asesor, $Asesorado, $Tema, $Area, $Fecha, $Hora, $Estatus)
    {
        $this->IDAsesoria=$IDAsesoria;
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