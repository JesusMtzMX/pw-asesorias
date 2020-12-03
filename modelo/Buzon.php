<?php
class Buzon {
    public $IDComentario;
    public $IDAsesorado;
    public $Tipo;
    public $Descripcion;

    function __construct($IDComentario,$IDAsesorado,
                         $Tipo, $Descripcion)
    {
        $this->IDComentario=$IDComentario;
        $this->IDAsesorado=$IDAsesorado;
        $this->Tipo=$Tipo;
        $this->Descripcion=$Descripcion;        
    }

}
?>