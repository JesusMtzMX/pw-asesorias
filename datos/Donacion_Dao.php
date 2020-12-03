<?php
require_once 'Conexion.php'; /*importa Conexion.php*/
require_once '../modelo/Donacion.php'; /*importa el modelo */

class Donacion_Dao
{
    
	private $conexion; /*Crea una variable conexion*/
        
    private function conectar(){
        try{
			$this->conexion = Conexion::abrirConexion(); /*inicializa la variable conexion, llamando el metodo abrirConexion(); de la clase Conexion por medio de una instancia*/
		}
		catch(Exception $e)
		{
			die($e->getMessage()); /*Si la conexion no se establece se cortara el flujo enviando un mensaje con el error*/
		}
    }
    
    /* IDDonacion
IDAsesor
IDAsesorado
Fecha
Cantidad
ViaPago
    */
    
   /*Metodo que obtiene todos los alumnos de la base de datos, retorna una lista de objetos */
	public function obtenerTodos()
	{
		try
		{
            $this->conectar();
            
			$lista = array(); /*Se declara una variable de tipo  arreglo que almacenará los registros obtenidos de la BD*/

			$sentenciaSQL = $this->conexion->prepare("SELECT IDDonacion, IDAsesor, IDAsesorado, Fecha, Cantidad, ViaPago
			FROM donaciones"); /*Se arma la sentencia sql para seleccionar todos los registros de la base de datos*/
			
			$sentenciaSQL->execute();/*Se ejecuta la sentencia sql, retorna un cursor con todos los elementos*/
            
            /*Se recorre el cursor para obtener los datos*/
			foreach($sentenciaSQL->fetchAll(PDO::FETCH_OBJ) as $fila)
			{
				$obj = new Donacion();

                $obj->IDDonacion = $fila->IDDonacion;
                $obj->IDAsesor = $fila->IDAsesor;
                $obj->IDAsesorado = $fila->IDAsesorado;
                $obj->Fecha = $fila->Fecha;
                $obj->Cantidad = $fila->Cantidad;
                $obj->ViaPago = $fila->ViaPago;
					
				$lista[] = $obj;
			}
            
			return $lista;
		}
        catch(Exception $e)
        {
			echo $e->getMessage();
			return null;
        }
        finally
        {
            Conexion::cerrarConexion();
        }
	}
    
    /*Metodo que obtiene un registro de la base de datos, retorna un objeto */
	public function obtenerUno($IDDonacion)
	{
		try
		{ 
            $this->conectar();
            
			$registro = null; /*Se declara una variable  que almacenará el registro obtenido de la BD*/
            
			$sentenciaSQL = $this->conexion->prepare("SELECT IDDonacion, IDAsesor, IDAsesorado, Fecha, Cantidad, ViaPago
			from donaciones WHERE IDDonacion = ?"); /*Se arma la sentencia sql para seleccionar todos los registros de la base de datos*/
			$sentenciaSQL->execute([$IDDonacion]);/*Se ejecuta la sentencia sql, retorna un cursor con todos los elementos*/
            
            /*Obtiene los datos*/
			$fila = $sentenciaSQL->fetch(PDO::FETCH_OBJ);
			
            $registro = new Donacion();

            $registro->IDDonacion = $fila->IDDonacion;
            $registro->IDAsesor = $fila->IDAsesor;
            $registro->IDAsesorado = $fila->IDAsesorado;
            $registro->Fecha = $fila->Fecha;
            $registro->Cantidad = $fila->Cantidad;
            $registro->ViaPago = $fila->ViaPago;
			
			return $registro; //Registro es un Empleado (objeto Empleado)
		}
        catch(Exception $e)
        {
            echo $e->getMessage();
            return null;
        }
        finally
        {
            Conexion::cerrarConexion();
        }
	}
    
    //Elimina el alumno con el id indicado como parámetro
	public function eliminar($IDDonacion)
	{
		try 
		{
			$this->conectar();
            
            $sentenciaSQL = $this->conexion->prepare("DELETE FROM donaciones WHERE IDDonacion = ?");			          
            
			$sentenciaSQL->execute(array($IDDonacion));
            
            return true;
        }
        catch (Exception $e) 
		{
            return false;
        }
        finally
        {
            Conexion::cerrarConexion();
        }
        
	}
	
	public function agregar(Donacion $obj)
	{
        $IDDonacion=0;
		try 
		{
            $sql = "INSERT INTO donaciones (IDDonacion, IDAsesor, IDAsesorado, Fecha, Cantidad, ViaPago) values (?, ?, ?, ?, ?, ?)";
            var_dump($sql);
            $this->conectar();
            
            $this->conexion->prepare($sql)
                ->execute(
                array(
                    $obj->IDDonacion,
                    $obj->IDAsesor,
                    $obj->IDAsesorado,
                    $obj->Fecha,
                    $obj->Cantidad,
                    $obj->ViaPago
                ));
                    
            $IDDonacion=$this->conexion->lastInsertId();
            
            return $IDDonacion;

        }
        catch (Exception $e)
        {
			echo $e->getMessage();
			return $IDDonacion;
        }
        finally
        {            
            /*
            En caso de que se necesite manejar transacciones, no deberá desconectarse mientras la transacción deba persistir
            */
            Conexion::cerrarConexion();
        }
    }
    
    public function editar($IDDonacion)
	{

		try 
		{
			$sql = "UPDATE donaciones SET Fecha = ?, Cantidad = ?, ViaPago = ? WHERE IDDonacion = ?";
            
            $this->conectar();
			
            $sentenciaSQL = $this->conexion->prepare($sql);			          
			$sentenciaSQL->execute(
				array(
                    $obj->Fecha,
                    $obj->Cantidad,
                    $obj->ViaPago
                ));

            return true;

        }
        catch (Exception $e)
        {
			echo $e->getMessage();
			return false;
        }
        finally
        {
            Conexion::cerrarConexion();
        }
	}
}