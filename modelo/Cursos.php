<?php
class Cursos {
    public $IDCurso;
    public $Nombre;
    public $Descripcion;
    public $AreaEstudio;
    public $Temario;
    public $Precio;
    public $IDAsesor;

    function __construct($IDCurso,$Nombre,$Descripcion,$AreaEstudio,
                         $Temario,$Precio,$IDAsesor){
        $this->IDCurso=$IDCurso;
        $this->Nombre=$Nombre;
        $this->Descripcion=$Descripcion;
        $this->AreaEstudio=$AreaEstudio;
        $this->Temario=$Temario;
        $this->Precio=$Precio;
        $this->IDAsesor=$IDAsesor;
    }

    function __construct1($IDCurso,$Nombre,$Descripcion,$AreaEstudio,
                          $Precio,$IDAsesor){
        $this->IDCurso=$IDCurso;
        $this->Nombre=$Nombre;
        $this->Descripcion=$Descripcion;
        $this->AreaEstudio=$AreaEstudio;        
        $this->Precio=$Precio;
        $this->IDAsesor=$IDAsesor;
    }
}
?>