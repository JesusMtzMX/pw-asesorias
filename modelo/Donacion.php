<?php
class Donacion {
    public $IDDonacion;
    public $IDAsesor;
    public $IDAsesorado;
    public $Fecha;
    public $Cantidad;
    public $ViaPago;

    function __construct($IDDonacion, $IDAsesor, $IDAsesorado,
                         $Fecha, $Cantidad, $ViaPago)
    {
        $this->IDDonacion=$IDDonacion;
        $this->IDAsesor =$IDAsesor;
        $this->IDAsesorado = $IDAsesorado;
        $this->Fecha = $Fecha;
        $this->Cantidad = $Cantidad;
        $this->ViaPago = $ViaPago;
    }

}
?>