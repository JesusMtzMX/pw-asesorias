<?php
require_once 'Conexion.php'; /*importa Conexion.php*/
require_once '../modelo/Reportar.php'; /*importa el modelo */

class Reportar_Dao
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
    
    
   /*Metodo que obtiene todos los alumnos de la base de datos, retorna una lista de objetos */
	public function obtenerTodos()
	{
		try
		{
            $this->conectar();
            
			$lista = array(); /*Se declara una variable de tipo  arreglo que almacenará los registros obtenidos de la BD*/

			$sentenciaSQL = $this->conexion->prepare("SELECT IDReporte, Motivo, Descripcion, IDAsesor, IDAsesorado
			FROM reportes"); /*Se arma la sentencia sql para seleccionar todos los registros de la base de datos*/
			
			$sentenciaSQL->execute();/*Se ejecuta la sentencia sql, retorna un cursor con todos los elementos*/
            
            /*Se recorre el cursor para obtener los datos*/
			foreach($sentenciaSQL->fetchAll(PDO::FETCH_OBJ) as $fila)
			{
				$obj = new Reportar();

				$obj->IDReporte = $fila->IDReporte;
				$obj->Motivo = 	$fila->Motivo;
				$obj->Descripcion = $fila->Descripcion;
				$obj->IDAsesor = $fila->IDAsesor;
				$obj->IDAsesorado = $fila->IDAsesorado;
				
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
	public function obtenerUno($IDReporte)
	{
		try
		{ 
            $this->conectar();
            
			$registro = null; /*Se declara una variable  que almacenará el registro obtenido de la BD*/
            
			$sentenciaSQL = $this->conexion->prepare("SELECT IDReporte, Motivo, Descripcion, IDAsesor, IDAsesorado
			from reportes WHERE IDReporte=?"); /*Se arma la sentencia sql para seleccionar todos los registros de la base de datos*/
			$sentenciaSQL->execute([$IDReporte]);/*Se ejecuta la sentencia sql, retorna un cursor con todos los elementos*/
            
            /*Obtiene los datos*/
			$fila=$sentenciaSQL->fetch(PDO::FETCH_OBJ);
			
            $registro = new Reportar();
			$registro ->IDReporte = $fila->IDReporte;
			$registro ->Motivo = $fila->Motivo;
			$registro ->Descripcion = $fila->Descripcion;
			$registro ->IDAsesor = $fila->IDAsesor;
			$registro ->IDAsesorado = $fila->IDAsesorado;
                
			
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
	public function eliminar($IDReporte)
	{
		try 
		{
			$this->conectar();
            
            $sentenciaSQL = $this->conexion->prepare("DELETE FROM reportes WHERE IDReporte = ?");			          
            
			$sentenciaSQL->execute(array($IDReporte));
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

	//Agrega un nuevo alumno de acuerdo al objeto recibido como parámetro
	public function agregar(Reportar $obj)
	{
        $IDReporte=0;
		try 
		{
            $sql = "INSERT INTO reportes (IDReporte, Motivo, Descripcion, IDAsesor, IDAsesorado) values(?, ?, ?, ?, ?)";
            var_dump($sql);
            $this->conectar();
            $this->conexion->prepare($sql)
                 ->execute(
                array($obj->IDReporte,
						$obj->Motivo,
						$obj->Descripcion,
						$obj->IDAsesor,
						$obj->IDAsesorado
					));
            $IDReporte=$this->conexion->lastInsertId();
            var_dump($IDReporte);
            return $IDReporte;
		}
		catch (Exception $e)
		{
			echo $e->getMessage();
			return $IDReporte;
		}
		finally
		{
            /*
            En caso de que se necesite manejar transacciones, no deberá desconectarse mientras la transacción deba persistir
            */
            Conexion::cerrarConexion();
        }
	}

	public function editar($IDReporte)
	{
		try 
		{
			$sql = "UPDATE reportes SET Motivo = ?, Descripcion = ? WHERE IDReporte = ?"; 
            
            $this->conectar();
			
            $sentenciaSQL = $this->conexion->prepare($sql);
			$sentenciaSQL->execute(
				array(
                    $obj->Motivo,
                    $obj->Descripcion,                    
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