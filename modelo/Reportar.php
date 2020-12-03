<?php
class Reportar {
    public $IDReporte;
    public $Motivo;
    public $Descripcion;
    public $IDAsesor;
    public $IDAsesorado;

    function __construct($IDReporte,$Motivo,$Descripcion,
                         $IDAsesor,$IDAsesorado)
    {
        $this->IDReporte=$IDReporte;
        $this->Motivo=$Motivo;
        $this->Descripcion=$Descripcion;
        $this->IDAsesor=$IDAsesor;
        $this->IDAsesorado=$IDAsesorado;
    }

    function __construct1($IDReporte,$Motivo,$Descripcion,
                         $IDAsesor)
    {
        $this->IDReporte=$IDReporte;
        $this->Motivo=$Motivo;
        $this->Descripcion=$Descripcion;
        $this->IDAsesor=$IDAsesor;        
    }

}
?>