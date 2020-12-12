<?php
require_once 'Conexion.php'; /*importa Conexion.php*/
require_once '../modelo/Asesoria.php'; /*importa el modelo */

class Asesoria_Dao
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

			$sentenciaSQL = $this->conexion->prepare("SELECT IDAsesoria, IDAsesor, IDAsesorado, Tema, AreaEstudio, Fecha, Hora, Estatus
			FROM asesorias"); /*Se arma la sentencia sql para seleccionar todos los registros de la base de datos*/
			
			$sentenciaSQL->execute();/*Se ejecuta la sentencia sql, retorna un cursor con todos los elementos*/
            
            /*Se recorre el cursor para obtener los datos*/
			foreach($sentenciaSQL->fetchAll(PDO::FETCH_OBJ) as $fila)
			{
				$obj = new Asesoria();

				$obj->IDAsesoria = $fila->IDAsesoria;
				$obj->IDAsesor = $fila->IDAsesor;
				$obj->IDAsesorado = $fila->IDAsesorado;
				$obj->Tema = $fila->Tema;
				$obj->AreaEstudio = $fila->AreaEstudio;
				$obj->Fecha = $fila->Fecha;
				$obj->Hora = $fila->Hora;
				$obj->Estatus = $fila->Estatus;
				
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
	public function obtenerUno($IDAsesoria)
	{
		try
		{ 
            $this->conectar();
            
			$registro = null; /*Se declara una variable  que almacenará el registro obtenido de la BD*/
            
			$sentenciaSQL = $this->conexion->prepare("SELECT IDAsesoria, IDAsesor, IDAsesorado, Tema, AreaEstudio, Fecha, Hora, Estatus
			FROM asesorias WHERE IDAsesoria = ?"); /*Se arma la sentencia sql para seleccionar todos los registros de la base de datos*/
			
			$sentenciaSQL->execute([$id]);/*Se ejecuta la sentencia sql, retorna un cursor con todos los elementos*/
            
            /*Obtiene los datos*/
			$fila=$sentenciaSQL->fetch(PDO::FETCH_OBJ);
			
			$registro = new Asesoria();
			
			$registro->IDAsesoria= $fila->IDAsesoria;
			$registro->IDAsesor = $fila->IDAsesor;
			$registro->IDAsesorado = $fila->IDAsesorado;
			$registro->Tema = $fila->Tema;
			$registro->AreaEstudio = $fila->AreaEstudio;
			$registro->Fecha = $fila->Fecha;
			$registro->Hora = $fila->Hora;
			$registro->Estatus = $fila->Estatus;
			
			return $registro;
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
    
	public function eliminar($IDAsesoria)
	{
		try 
		{
			$this->conectar();
            
            $sentenciaSQL = $this->conexion->prepare("DELETE FROM asesorias WHERE IDAsesoria = ?");			          
            
			$sentenciaSQL->execute(array($IDAsesoria));
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

	public function agregar(Asesoria $obj)
	{
        $clave=0;
		try 
		{
            $sql = "INSERT INTO asesorias (IDAsesoria, IDAsesor, IDAsesorado, Tema, AreaEstudio, Fecha, Hora, Estatus)
			VALUES(?, ?, ?, ?, ?, ?, ?, ?)";
			
			var_dump($sql);

			$this->conectar();
			
            $this->conexion->prepare($sql)
                ->execute(
                array($obj->IDAsesoria,
					$obj->IDAsesor,
					$obj->IDAsesorado,
					$obj->Tema,
					$obj->AreaEstudio,
					$obj->Fecha,
					$obj->Hora,
					$obj->Estatus
					));

            $clave=$this->conexion->lastInsertId();
            var_dump($clave);
            return $clave; //Si el INSERT se realiza correctamente, se retorna la clave del último registro
		}
		catch (Exception $e)
		{
			echo $e->getMessage();
			return $clave; //Si no se realiza el INSERT se retorna 0
		}
		finally
		{    
            /*
            En caso de que se necesite manejar transacciones, no deberá desconectarse mientras la transacción deba persistir
            */
            Conexion::cerrarConexion();
        }
	}

	public function editar($IDAsesoria)
	{
		try 
		{
			$sql = "UPDATE asesorias SET Tema = ?, AreaEstudio= ?, Fecha = ?, Hora = ?, Estatus = ?
				WHERE IDAsesoria = ?";

            $this->conectar();
            
            $sentenciaSQL = $this->conexion->prepare($sql);			          
			$sentenciaSQL->execute(
				array(	$obj->Tema,
				$obj->AreaEstudio,
				$obj->Fecha,
				$obj->IDAsesoria )
					);
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

	public function obtenerAsesoriasUsuario($IDAsesorado)
	{
		require_once '../modelo/Detalle_Asesoria.php';

		try
		{
            $this->conectar();
            
			$lista = array();

			$sentenciaSQL = $this->conexion->prepare("SELECT CONCAT(asesores.Nombre, ' ', asesores.Apellidos) Asesor, CONCAT(asesorados.Nombre, ' ', asesorados.Apellidos) Asesorado, asesorias.Tema Tema, asesorias.AreaEstudio Area, asesorias.Fecha Fecha, asesorias.Hora Hora, asesorias.Estatus Estatus
			FROM asesorias
			INNER JOIN asesorados ON asesorias.IDAsesorado = asesorados.IDAsesorado
			INNER JOIN asesores ON asesorias.IDAsesor = asesores.IDAsesor WHERE asesorados.IDAsesorado = ?;");
			
			$sentenciaSQL->execute([$IDAsesorado]);
            
			foreach($sentenciaSQL->fetchAll(PDO::FETCH_OBJ) as $fila)
			{
				$obj = new Detalle_Asesoria();

				$obj->Asesor = $fila->Asesor;
				$obj->Asesorado = $fila->Asesorado;
				$obj->Tema = $fila->Tema;
				$obj->Area = $fila->Area;
				$obj->Fecha = $fila->Fecha;
				$obj->Hora = $fila->Hora;
				$obj->Estatus = $fila->Estatus;
				
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

	public function obtenerAsesoriasAsesor($IDAsesor)
	{
		require_once '../modelo/Detalle_Asesoria.php';

		try
		{
            $this->conectar();
            
			$lista = array();

			$sentenciaSQL = $this->conexion->prepare("SELECT CONCAT(asesores.Nombre, ' ', asesores.Apellidos) Asesor, CONCAT(asesorados.Nombre, ' ', asesorados.Apellidos) Asesorado, asesorias.Tema Tema, asesorias.AreaEstudio Area, asesorias.Fecha Fecha, asesorias.Hora Hora, asesorias.Estatus Estatus
			FROM asesorias
			INNER JOIN asesorados ON asesorias.IDAsesorado = asesorados.IDAsesorado
			INNER JOIN asesores ON asesorias.IDAsesor = asesores.IDAsesor WHERE asesores.IDAsesor = ?;");
			
			$sentenciaSQL->execute([$IDAsesor]);
            
			foreach($sentenciaSQL->fetchAll(PDO::FETCH_OBJ) as $fila)
			{
				$obj = new Detalle_Asesoria();

				$obj->Asesor = $fila->Asesor;
				$obj->Asesorado = $fila->Asesorado;
				$obj->Tema = $fila->Tema;
				$obj->Area = $fila->Area;
				$obj->Fecha = $fila->Fecha;
				$obj->Hora = $fila->Hora;
				$obj->Estatus = $fila->Estatus;
				
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

}