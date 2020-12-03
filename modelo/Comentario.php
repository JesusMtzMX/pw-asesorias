<?php
class Comentario {
    public $IDComentario;
    public $Alumno;
    public $Titulo;
    public $Mensaje;
    public $IDCurso;

    function __construct($IDComentario,$Alumno,
                         $Titulo, $Mensaje, $IDCurso)
    {
        $this->IDComentario=$IDComentario;
        $this->Alumno=$Alumno;
        $this->Titulo=$Titulo;
        $this->Mensaje=$Mensaje;
        $this->IDCurso=$IDCurso;       
    }
}
?>