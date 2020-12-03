<?php
class Asesoria {
    public $IDAsesoria;
    public $IDAsesor;
    public $IDAsesorado;
    public $Tema;
    public $AreaEstudio;
    public $Fecha;
    public $Hora;
    public $Estatus;

    function __construct(){}
    
    function __construct1($IDAsesoria,$IDAsesor,$IDAsesorado,
                        $Tema,$AreaEstudio,$Fecha, $Hora, $Estatus)
    {
        $this->IDAsesoria=$IDAsesoria;
        $this->IDAsesor=$IDAsesor;
        $this->IDAsesorado=$IDAsesorado;
        $this->Tema=$Tema;
        $this->AreaEstudio=$AreaEstudio;
        $this->Fecha=$Fecha;
        $this->Hora=$Hora;
        $this->Estatus=$Estatus;
    }

}
?>